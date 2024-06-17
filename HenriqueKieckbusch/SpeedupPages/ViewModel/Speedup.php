<?php
declare(strict_types=1);

namespace HenriqueKieckbusch\SpeedupPages\ViewModel;
use HenriqueKieckbusch\SpeedupPages\Model\Config;
use Magento\Framework\DataObject;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Speedup extends DataObject implements ArgumentInterface
{
    private SerializerInterface $serializer;

    private Config $config;

    public function __construct(
        SerializerInterface $serializer,
        Config $config
    ) {
        parent::__construct();
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

