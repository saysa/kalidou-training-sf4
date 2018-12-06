<?php

namespace App\Controller;


use App\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListChaptersController extends AbstractController
{
    /**
     * @Route(path="/chapters", name="list_chapters")
     */
    public function listChaptersController()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $chapterRepository = $entityManager->getRepository(Chapter::class);

        $chapters = $chapterRepository->findAll();

        return $this->render('chapter/list_chapters.html.twig', [
           'chapters' => $chapters,
        ]);
    }
}