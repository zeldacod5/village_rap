<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\SubcategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CatalogueController extends AbstractController
{
    // affiche la liste des catégories -> Page 1
    #[Route('/catalogue', name: 'catalogue')]
    public function catalogue(ProductRepository $repo, CategoryRepository $repo_categorie): Response
    {

        $categories = $repo ->findAll();

        return $this->render('catalogue/catalogue.html.twig', [
            'products' => $repo->findAll(),
            'categories' => $repo_categorie->findAll()
        ]);
    }

    // affiche la liste des sous-catégories -> Page 2
    #[Route('/souscategories/{id}', name: 'souscategories')]
    public function souscategories(SubcategoryRepository $repo,  $id): Response
    {
        $liste = $repo->findBy([ "category" => $id]);
        

        return $this->render('catalogue/souscategories.html.twig', [
            // nom de la variable twig
            'liste' => $liste
        ]);
    }

    // afficher la liste des produits d'une sous-catégories -> Page 3
    #[Route('/produits/{id}', name: 'produits')]
    public function produits(ProductRepository $repo, $id): Response
    {
        $liste = $repo->findBy([ "subcategorie" => $id]);
        
        return $this->render('catalogue/produits.html.twig', [
            'liste' => $liste
        ]);
    }

    // affiche le detail d'un produit -> Page 4
    #[Route('/details/{id}', name: 'details')]
    public function details(ProductRepository $repo, $id): Response
    {
        $liste = $repo->findBy([ "detail" => $id]);
        
        return $this->render('catalogue/details.html.twig', [
            'liste' => $liste
        ]);
    }
}

