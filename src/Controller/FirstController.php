<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/acceuil', name: 'acceuil')]
    public function acceuil(): Response
    {
        return $this->render('first/acceuil.html.twig', [
            'controller_name' => 'FirstController',
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
