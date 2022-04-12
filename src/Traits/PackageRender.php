<?php

namespace App\Traits;

trait PackageRender {
    protected abstract function getThisInstance();
    protected abstract function getPackages();

    public function renderWithPackage($templateName, $params)
    {
        $js = [];
        $css = [];
        foreach ($this->getPackages() as $package) {
            $js = array_merge($js, $package->getJs());
            $css = array_merge($css, $package->getCss());
        }
        return $this->getThisInstance()->render($templateName, array_merge(
            [
                'js' => $js,
                'css' => $css
            ],
            $params
        ));
    }
}