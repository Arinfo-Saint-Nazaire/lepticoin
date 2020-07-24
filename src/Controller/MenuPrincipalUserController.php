<?php

namespace App\Controller;

use App\Repository\NoticeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MenuPrincipalUserController extends AbstractController

{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/menu/principal/user", name="menu_principal_user")
     */
    public function index(UserRepository $userRepository,NoticeRepository $noticeRepository)
    {
        return $this->render('menu_principal_user/index.html.twig', [
            'controller_name' => 'MenuPrincipalUserController',
            'user' => $userRepository->findall(),
            'notice' => $noticeRepository->findAll(),
        ]);
    }


    /**
     * @IsGranted("ROLE_USER")
     * @Route("/menu/notice", name="notice_user_edit")
     */

    public function caca(UserRepository $userRepository,NoticeRepository $noticeRepository)
    {
        return $this->render('menu_principal_user/noticeEdit.html.twig', [
            'controller_name' => 'MenuPrincipalUserController',
            'user' => $userRepository->findall(),
            'notice' => $noticeRepository->findAll(),
        ]);
    }
  
}
