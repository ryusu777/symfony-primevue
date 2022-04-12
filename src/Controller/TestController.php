<?php

namespace App\Controller;

use App\Packages\PrimeVuePackage;
use App\Packages\VuePackage;
use App\Traits\PackageRender;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    use PackageRender;
    private $packages;

    protected function getThisInstance()
    {
        return $this;
    }

    protected function getPackages()
    {
        return $this->packages;
    }

    public function __construct()
    {
        $this->packages = 
        [
            new PrimeVuePackage()
        ];
    }

    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/form', name: 'app_form')]
    public function form(): Response
    {
        $package = new VuePackage();
        return $this->render('test/home.cdn.html.twig', [
            'js' => $package->getJs(),
            'css' => $package->getCss()
        ]);
    }

    #[Route('/cdn', name: 'app_cdn')]
    public function cdn(): Response
    {
        return $this->renderWithPackage('test/about.cdn.html.twig', []);
    }
}
