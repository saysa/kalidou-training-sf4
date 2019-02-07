<?php

namespace App\Controller;

use App\Form\AddChapterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddChapterController extends AbstractController
{
    /**
     * @Route(path="/add/chapter", name="add_chapter")
     * @param Request $request
     *
     * @return Response
     */
    public function addChapter(Request $request)
    {
        $form = $this->createForm(AddChapterType::class)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // sauvegarde dans la base de donnée
            $chapter = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chapter);
            foreach ($chapter->getTags() as $tag) {
                $entityManager->persist($tag);
            }
            $entityManager->flush();
        }

        return $this->render('chapter/add_chapter.html.twig', [
            'form_add_chapter' => $form->createView(),
        ]);
    }
}