<?php

namespace App\Controller;

use App\Entity\Notice;
use App\Form\NoticeType;
use App\Repository\NoticeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/notice")
 */
class NoticeController extends AbstractController
{
    /**
     * @Route("/", name="notice_index", methods={"GET"})
     */
    public function index(NoticeRepository $noticeRepository): Response
    {
        return $this->render('notice/index.html.twig', [
            'notices' => $noticeRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/new", name="notice_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $notice = new Notice();
        $notice->setUser($this->getUser());
        $notice->setDateNotice(new \DateTime());
        $form = $this->createForm(NoticeType::class, $notice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** Début du code à ajouter **/
            $photoOneNotice = $form->get('photoOneNotice')->getData();

            if ($photoOneNotice) {
                $originalFilename = pathinfo($photoOneNotice->getClientOriginalName(), PATHINFO_FILENAME);
                // ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoOneNotice->guessExtension();

                // Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $photoOneNotice->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant le téléchargement du fichier
                }

                // met à jour la propriété 'photoOneNotice' pour stocker le nom du fichier PDF
                // au lieu de son contenu
                $notice->setphotoOneNotice($newFilename);
            }
            /** Fin du code à ajouter **/
            $photoTwoNotice = $form->get('photoTwoNotice')->getData();

            if ($photoTwoNotice) {
                $originalFilename = pathinfo($photoTwoNotice->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoTwoNotice->guessExtension();

                try {
                    $photoTwoNotice->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {}

                $notice->setphotoTwoNotice($newFilename);
            }

            $photoThreeNotice = $form->get('photoThreeNotice')->getData();

            if ($photoThreeNotice) {
                $originalFilename = pathinfo($photoThreeNotice->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoThreeNotice->guessExtension();

                try {
                    $photoThreeNotice->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {}

                $notice->setphotoThreeNotice($newFilename);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($notice);
            $entityManager->flush();

            return $this->redirectToRoute('notice_index');
        }

        return $this->render('notice/new.html.twig', [
            'notice' => $notice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="notice_show", methods={"GET"})
     */
    public function show(Notice $notice): Response
    {
        return $this->render('notice/show.html.twig', [
            'notice' => $notice,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/{id}/edit", name="notice_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Notice $notice, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(NoticeType::class, $notice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** Début du code à ajouter **/
            $photoOneNotice = $form->get('photoOneNotice')->getData();

            if ($photoOneNotice) {
                $originalFilename = pathinfo($photoOneNotice->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoOneNotice->guessExtension();

                try {
                    $photoOneNotice->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {}

                $notice->setPhotoOneNotice($newFilename);
            }
            /** Fin du code à ajouter **/

            /** Début du code à ajouter **/
            $photoTwoNotice = $form->get('photoTwoNotice')->getData();

            if ($photoTwoNotice) {
                $originalFilename = pathinfo($photoTwoNotice->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoTwoNotice->guessExtension();

                try {
                    $photoTwoNotice->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {}

                $notice->setPhotoTwoNotice($newFilename);
            }
            /** Fin du code à ajouter **/

            /** Début du code à ajouter **/
            $photoThreeNotice = $form->get('photoThreeNotice')->getData();

            if ($photoThreeNotice) {
                $originalFilename = pathinfo($photoThreeNotice->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoThreeNotice->guessExtension();

                try {
                    $photoThreeNotice->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {}

                $notice->setPhotoThreeNotice($newFilename);
            }
            /** Fin du code à ajouter **/

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('notice_index');
        }

        return $this->render('notice/edit.html.twig', [
            'notice' => $notice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="notice_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Notice $notice): Response
    {
        if ($this->isCsrfTokenValid('delete' . $notice->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($notice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('notice_index');
    }
}
