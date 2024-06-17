define(['jquery'], function($) {
    'use strict';

    return function(config, element) {
        const specType = 'speculationrules';
        $(document).ready(function() {

            const urls = listElements();
            if (supportTechnologies())
            {
                const specScript = document.createElement("script");
                specScript.type = "speculationrules";
                const specRules = {
                    prerender: [
                        {
                            source: "list",
                            urls: urls,
                            eagerness: config.preload.eagerness
                        },
                    ],
                };
                specScript.textContent = JSON.stringify(specRules);
                document.body.append(specScript);
            } else {
                for(let i in urls) {
                    $("<link>", {
                        rel: "prefetch",
                        href: urls[i]
                    }).appendTo("head");
                }
            }
        });

        function supportTechnologies() {
            return HTMLScriptElement.supports && HTMLScriptElement.supports(specType);
        }

        function listElements() {
            let elements = [];
            if (config.preload.pdp) {
                elements.push(
                    'a.product'
                );
            }
            if (config.preload.category) {
                elements.push(
                    '.category-item a'
                );
            }

            if (config.preload.cms) {
                elements.push(
                    '[class*="link"] a:not([class])'
                );
            }

            if (config.preload.cart) {
                elements.push(
                    'a.showcart'
                );
            }

            const links = [];
            //foreach to guarantee the order, products first, then categories, then cms...
            for(let i in elements) {
                $(elements[i]).each(function() {
                    const href = $(this).attr('href');
                    if (href) {
                        const currentDomain = window.location.origin;
                        const isInternalLink = href.startsWith(currentDomain) || href.startsWith('/');
                        const isValidLink = !href.includes('referer') && !href.includes('logout');

                        if (isInternalLink && isValidLink) {
                            links.push(href);
                        }
                    }
                });
            }

            return links;
        }
    };
});
