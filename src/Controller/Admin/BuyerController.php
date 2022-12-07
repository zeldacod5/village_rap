<?php

namespace App\Controller\Admin;

use App\Entity\Buyer;
use App\Form\BuyerType;
use App\Repository\BuyerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/buyer')]
class BuyerController extends AbstractController
{
    #[Route('/', name: 'app_buyer_index', methods: ['GET'])]
    public function index(BuyerRepository $buyerRepository): Response
    {
        return $this->render('buyer/index.html.twig', [
            'buyers' => $buyerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_buyer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BuyerRepository $buyerRepository): Response
    {
        $buyer = new Buyer();
        $form = $this->createForm(BuyerType::class, $buyer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $buyerRepository->save($buyer, true);

            return $this->redirectToRoute('app_buyer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('buyer/new.html.twig', [
            'buyer' => $buyer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_buyer_show', methods: ['GET'])]
    public function show(Buyer $buyer): Response
    {
        return $this->render('buyer/show.html.twig', [
            'buyer' => $buyer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_buyer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Buyer $buyer, BuyerRepository $buyerRepository): Response
    {
        $form = $this->createForm(BuyerType::class, $buyer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $buyerRepository->save($buyer, true);

            return $this->redirectToRoute('app_buyer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('buyer/edit.html.twig', [
            'buyer' => $buyer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_buyer_delete', methods: ['POST'])]
    public function delete(Request $request, Buyer $buyer, BuyerRepository $buyerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$buyer->getId(), $request->request->get('_token'))) {
            $buyerRepository->remove($buyer, true);
        }

        return $this->redirectToRoute('app_buyer_index', [], Response::HTTP_SEE_OTHER);
    }
}
