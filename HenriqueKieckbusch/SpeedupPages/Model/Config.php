<?php
declare(strict_types=1);

namespace HenriqueKieckbusch\SpeedupPages\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    private const XML_PATH_ENABLE = 'speed_up/speedup_module/enabled';
    private const XML_PATH_PRELOAD_PDP = 'speed_up/speedup_module/preload_products_pdp';
    private const XML_PATH_PRELOAD_CATEGORIES = 'speed_up/speedup_module/preload_category_pages';
    private const XML_PATH_PRELOAD_CMS = 'speed_up/speedup_module/preload_cms_pages';
    private const XML_PATH_PRELOAD_ADD_TO_CART = 'speed_up/speedup_module/preload_cart_after_add_to_the_cart';
    private ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnable($website_id = null): bool
    {
        return (bool) $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLE,
            ScopeInterface::SCOPE_WEBSITE,
            $website_id
        );
    }

    public function needPreloadPDP($website_id = null): bool
    {
        return (bool) $this->scopeConfig->isSetFlag(
            self::XML_PATH_PRELOAD_PDP,
            ScopeInterface::SCOPE_WEBSITE,
            $website_id
        );
    }

    public function needPreloadCategories($website_id = null): bool
    {
        return (bool) $this->scopeConfig->isSetFlag(
            self::XML_PATH_PRELOAD_CATEGORIES,
            ScopeInterface::SCOPE_WEBSITE,
            $website_id
        );
    }

    public function needPreloadCMS($website_id = null): bool
    {
        return (bool) $this->scopeConfig->isSetFlag(
            self::XML_PATH_PRELOAD_CMS,
            ScopeInterface::SCOPE_WEBSITE,
            $website_id
        );
    }

    public function needPreloadAddToCart($website_id = null): bool
    {
        return (bool) $this->scopeConfig->isSetFlag(
            self::XML_PATH_PRELOAD_ADD_TO_CART,
            ScopeInterface::SCOPE_WEBSITE,
            $website_id
        );
    }
}
