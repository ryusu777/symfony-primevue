<?php

namespace App\Packages;

abstract class AbstractPackage 
{
    private $js = [];
    private $css = [];
    protected $dependencies = [];

    public function __construct()
    {
        $this->addPackages();
    }

    public function addJs(string|array $url)
    {
        if (is_array($url))
            $this->js = array_merge($this->js, $url);
        else
            array_push($this->js, $url);
        $this->js = array_unique($this->js);
    }

    public function addCss(string|array $url)
    {
        if (is_array($url))
            $this->css = array_merge($this->css, $url);
        else
            array_push($this->css, $url);
        $this->css = array_unique($this->css);
    }

    public function getJs(): array
    {
        return $this->js;
    }

    public function getCss(): array
    {
        return $this->css;
    }

    protected function applyDependencies()
    {
        foreach ($this->dependencies as $dependency) {
            $this->addCss($dependency->getCss());
            $this->addJs($dependency->getJs());
        }
    }

    public abstract function addPackages();
}