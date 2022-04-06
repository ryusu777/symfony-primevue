<?php
namespace App\Twig;

use Symfony\Component\Asset\UrlPackage;
use Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PackageExtension extends AbstractExtension 
{
    private $packages;

    public function __construct() {
        $this->packages = [
            'prime-vue' => new UrlPackage('https://unpkg.com/primevue/', new StaticVersionStrategy('v1')),
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