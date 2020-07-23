<?php

namespace App\Controller;

use App\Repository\NoticeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(NoticeRepository $noticeRepository)
    {
        return $this->render('home/index.html.twig', [
            'notices' => $noticeRepository->findAll(),
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
