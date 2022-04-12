<?php

namespace App\Packages;

class VuePackage extends AbstractPackage 
{
    public function __construct()
    {
        $this->addPackages();
    }

    public function addPackages()
    {
        $this->addJs("https://unpkg.com/vue@next");
    }
}