<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuizzController extends AbstractController
{

    public function categorie(CategorieRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();

        return $this->render("quizz/categorie.html.twig", [
            'title' => "Bienvenue sur le meilleur Quizz de votre vie !",
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/quizz", name="quizz")
     */
    public function index()
    {
       

        return $this->render('quizz/index.html.twig', [
            'controller_name' => 'QuizzController',
            
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(){

        $repo = $this->getDoctrine()->getRepository(Categorie::class);
        
        $categories = $repo->findAll();

        return $this->render("quizz/index.html.twig", [
            'title' => "Bienvenue sur le meilleur Quizz de votre vie !",
            'categories' => $categories
        ]);
    }
}
