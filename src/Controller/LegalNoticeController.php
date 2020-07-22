<?php

namespace App\Controller;

use App\Entity\LegalNotice;
use App\Form\LegalNoticeType;
use App\Repository\LegalNoticeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/legalNotice")
 */
class LegalNoticeController extends AbstractController
{
    /**
     * @Route("/", name="legalNotice", methods={"GET"})
     */
    public function index(LegalNoticeRepository $legalNoticeRepository): Response
    {
        return $this->render('legalNotice/index.html.twig', [
            'legalNotices' => $legalNoticeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="legalNotice_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $legalNotice = new LegalNotice();
        $form = $this->createForm(LegalNoticeType::class, $legalNotice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($legalNotice);
            $entityManager->flush();

            return $this->redirectToRoute('legalNotice_index');
        }

        return $this->render('legalNotice/new.html.twig', [
            'legalNotice' => $legalNotice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="legalNotice_show", methods={"GET"})
     */
    public function show(LegalNotice $legalNotice): Response
    {
        return $this->render('legalNotice/show.html.twig', [
            'legalNotice' => $legalNotice,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="legalNotice_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LegalNotice $legalNotice): Response
    {
        $form = $this->createForm(LegalNoticeType::class, $legalNotice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('legalNotice_index');
        }

        return $this->render('legalNotice/edit.html.twig', [
            'legalNotice' => $legalNotice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="legalNotice_delete", methods={"DELETE"})
     */
    public function delete(Request $request, LegalNotice $legalNotice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$legalNotice->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($legalNotice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('legalNotice_index');
    }
}
