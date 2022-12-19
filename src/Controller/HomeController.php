<?php

namespace App\Controller;

use App\Entity\Categorie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(ManagerRegistry $doctrine): Response
    {   
        // Récupère toutes les catégories et les tries par leur nom en DESC
        $categorie = $doctrine->getRepository(Categorie::class)->findBy([], ['nom' => 'DESC']);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            // Créer un tableau de categories qui prend les valeurs de categorie
            'categories' => $categorie
        ]);
    }
}
