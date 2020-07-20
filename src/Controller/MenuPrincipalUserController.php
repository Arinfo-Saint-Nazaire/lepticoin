<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MenuPrincipalUserController extends AbstractController
{
    /**
     * @Route("/menu/principal/user", name="menu_principal_user")
     */
    public function index()
    {
        return $this->render('menu_principal_user/index.html.twig', [
            'controller_name' => 'MenuPrincipalUserController',
        ]);
    }
}
