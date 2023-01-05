<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FirstController extends AbstractController
{
    #[Route('/', name: 'acceuil')]
    public function acceuil(CategoryRepository $repo, ProductRepository $repo_product): Response
    {

        return $this->render('first/acceuil.html.twig', [
            'categories' => $repo->findAll(),
            'enavant' => $repo_product->findBy([ 'deals' => true])
        ]);
    }

    #[Route('/error', name: 'error')]
    public function error(): Response
    {
        return $this->render('first/error.html.twig', [
            'controller_name' => 'FirstController',
        ]);
    }

    #[Route('/qui', name: 'qui')]
    public function qui(): Response
    {
        return $this->render('first/qui.html.twig', [
            'controller_name' => 'FirstController',
        ]);
    }
    
}
