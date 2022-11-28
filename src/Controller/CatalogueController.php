<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'catalogue')]
    public function catalogue(): Response
    {
        return $this->render('catalogue/catalogue.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }

    #[Route('/categories', name: 'categories')]
    public function categories(): Response
    {
        return $this->render('catalogue/categories.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }

    #[Route('/subcategories', name: 'subcategories')]
    public function subcategories(): Response
    {
        return $this->render('catalogue/subcategories.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }

    #[Route('/product', name: 'product')]
    public function product(): Response
    {
        return $this->render('catalogue/product.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }

    #[Route('/details', name: 'details')]
    public function details(): Response
    {
        return $this->render('catalogue/details.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }
}

