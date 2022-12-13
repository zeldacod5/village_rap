<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    #[Route('/add/{id}', name: 'app_add')]
    public function add(SessionInterface $session, Product $id): Response
    {
        

        
        $panier = $session->get("panier", []);

        $panier[] = $id;

        $session->set("panier", $panier);


        return $this->redirect("/panier");
    }



    #[Route('/panier', name: 'app_panier')]
    public function index(SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);

        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
        ]);
    }

    #[Route('/clear', name: 'app_clear')]
    public function clear(SessionInterface $session): Response
    {
        $panier = $session->set("panier", []);

        return $this->redirect("/panier");
    }
}
