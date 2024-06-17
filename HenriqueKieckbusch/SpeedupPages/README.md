# Speedup pages
    ``henriquekieckbusch/module-speeduppages``

## Main Functionalities
This module will add a javascript that will use the new Browser technology called "speculationrules" with
the option Prerender. To make the pages load faster.

We are using the "moderate" eagerness:
https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script/type/speculationrules#eagerness
it means the url will preload with the "mouse over".
You could change to "immediate" if you prefer, but I don't recommend it for now.

This technology is not present in all browsers, but it is present in the most used ones.

We check it first, so if the browser can't use it, the module will just not run the script.

To be sure it will run, test on Chrome, Opera or Edge.

Maybe when you are reading this: Safari, Firefox, Brave... already support it.
But they didn't support it when I created this module.

## Configuration

 - Check inside the Admin panel: Store > Configuration > Advanced > Speedup
 - Be sure you are at "Website" scope level, it just shows the configs on this Scope




