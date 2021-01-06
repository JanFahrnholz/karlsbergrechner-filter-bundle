<?php declare(strict_types=1);


namespace Karlsbergrechner\FilterBundle\Controller;

use App\Service\BaseConfigManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BundleConfig extends AbstractController
{
    /**
     * @var BaseConfigManager
     */
    private $baseConfigManager;

    private $config;

    public function __construct(BaseConfigManager $baseConfigManager)
    {
        $this->baseConfigManager = $baseConfigManager;

        $this->config = [
            [
                "beschreibung" => "Filter Bundle ein oder ausschalten",
                "pfad" => "karlsbergrechner/filterBundle/enable_bundle",
                "wert" => "1",
                "optionen" => "0||1"
            ],
        ];

        $this->baseConfigManager->addConfig($this->config);
        dd($this->baseConfigManager->getConfig());

    }
}