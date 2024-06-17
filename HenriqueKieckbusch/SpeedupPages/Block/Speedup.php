<?php
declare(strict_types=1);

namespace HenriqueKieckbusch\SpeedupPages\Block;
use Aheadworks\Blog\Model\Serialize\SerializeInterface;
use HenriqueKieckbusch\SpeedupPages\Model\Config;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Speedup extends Template
{
    private SerializeInterface $serializer;

    private Config $config;

    public function __construct(
        Context $context,
        SerializeInterface $serializer,
        Config $config,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->serializer = $serializer;
        $this->config = $config;
    }

    public function getSpeedupConfig(): string
    {
        return $this->serializer->serialize([
            'cart' => $this->config->needPreloadAddToCart(),
            'category' => $this->config->needPreloadCategories(),
            'pdp' => $this->config->needPreloadPDP(),
            'cms' => $this->config->needPreloadCMS(),
            'eagerness' => 'moderate'
        ]);
    }

    public function isDisabled(): bool
    {
        return !$this->config->isEnable();
    }
}
