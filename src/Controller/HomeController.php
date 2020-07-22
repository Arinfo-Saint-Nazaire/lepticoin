<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\NoticeRepository;
use App\Entity\Notice;

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
}
