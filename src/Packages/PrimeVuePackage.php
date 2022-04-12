<?php

namespace App\Packages;

use Symfony\Component\Asset\UrlPackage;
use Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy;

class PrimeVuePackage extends AbstractPackage
{
    private static $package;

    public static function getUrlPackage() 
    {
        return static::$package;
    }

    public function __construct()
    {
        static::$package = new UrlPackage("https://unpkg.com/primevue/", new StaticVersionStrategy("v1"));
        $this->dependencies = [
            new VuePackage()
        ];
        $this->applyDependencies();
        parent::__construct();
    }

    public function addPackages()
    {
        $this->addCss("https://unpkg.com/primevue/resources/themes/lara-light-purple/theme.css");
        $this->addCss("https://unpkg.com/primevue/resources/primevue.min.css");
        $this->addCss("https://unpkg.com/primeflex/primeflex.min.css");
        $this->addCss("https://unpkg.com/primeicons/primeicons.css");
        $this->addJs("https://unpkg.com/primevue/core/core.min.js");
    }
}