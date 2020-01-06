<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\ReponseUser;
use App\Form\ReponseQuizzType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionController extends AbstractController
{
    /**
     * @Route("/question/{id}", name="question")
     */
    public function index($id, Request $request)
    {

        $user_reponse = new ReponseUser;

        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->find($id);

        $form = $this->createForm(ReponseQuizzType::class, null, ["question_id" => $id]);

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user_reponse);
        $em->flush();


        return $this->render('question/index.html.twig', [
            'controller_name' => 'QuestionController',
            'categorie' => $categorie,
            'reponseform' => $form->createView()
        ]);
    }
}
