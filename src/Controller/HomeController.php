<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/rgpd/index", name="rgpd")
     */
    public function rgpd()
    {
        return $this->render('rgpd/index.html.twig', [
            'controller_name' => 'RgpdController',
        ]);
    }
}
