<?php
namespace App\Twig;

use App\Packages\PrimeVuePackage;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PackageExtension extends AbstractExtension 
{
    private $packages;

    public function __construct() {
        $this->packages = [
            'prime-vue' => PrimeVuePackage::getUrlPackage()
        ];
    }

    public function getFunctions() 
    {
        return [
            new TwigFunction('packageUrl', [$this, 'getPackageUrl']),
            new TwigFunction('primevuePackage', [$this, 'getPrimeVuePackage']),
        ];
    }

    public function getPrimeVuePackage(string $component): string
    {
        return $this->packages['prime-vue']->getUrl("$component/$component.min.js");
    }

    public function getPackageUrl(string $packageSrc, string $packagePath): string
    {
        return $this->packages[$packageSrc]->getUrl($packagePath);
    }
}