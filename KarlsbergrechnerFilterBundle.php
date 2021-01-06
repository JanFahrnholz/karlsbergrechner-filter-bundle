<?php declare(strict_types=1);


namespace Karlsbergrechner\FilterBundle;

use App\Entity\Getraenke;
use Karlsbergrechner\FilterBundle\Controller\BundleConfig;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class KarlsbergrechnerFilterBundle extends Bundle
{
    /**
     * @var \string[][]
     */
    private $filterOptions;
    /**
     * @var BundleConfig
     */
    private $bundleConfig;

    public function __construct()
    {
        $this->filterOptions = [
            [
                "zuFiltern" => Getraenke::class,
                "filternNach" => "punkte",
            ],
        ];

//        $this->bundleConfig = $bundleConfig;
    }

    public function filter(array $postValues)
    {
        $filterValues = $this->prepareFilterValues($postValues);
    }

    /**
     * @param $postValues
     * @return array
     */
    public function prepareFilterValues($postValues): array
    {
        $preparedFilterValues = array();

        $validFilterValues = $this->getValidFilterValues($postValues);

        dump($validFilterValues);

        return $preparedFilterValues;
    }

    public function getValidFilterValues($values)
    {
        $validFilterValues = array();

        foreach (array_keys($values) as $value) {
            if ($this->startsWith($value, "filter")) {
                $validFilterValues[] = $value;
            }
        }

        return $validFilterValues;
    }

    function startsWith( $haystack, $needle ) {
        $length = strlen( $needle );
        return substr( $haystack, 0, $length ) === $needle;
    }

    function endsWith( $haystack, $needle ) {
        $length = strlen( $needle );
        if( !$length ) {
            return true;
        }
        return substr( $haystack, -$length ) === $needle;
    }
}

