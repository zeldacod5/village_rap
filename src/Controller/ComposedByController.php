<?php

namespace App\Controller;

use App\Entity\ComposedBy;
use App\Form\ComposedByType;
use App\Repository\ComposedByRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/composed/by')]
class ComposedByController extends AbstractController
{
    #[Route('/', name: 'app_composed_by_index', methods: ['GET'])]
    public function index(ComposedByRepository $composedByRepository): Response
    {
        return $this->render('composed_by/index.html.twig', [
            'composed_bies' => $composedByRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_composed_by_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ComposedByRepository $composedByRepository): Response
    {
        $composedBy = new ComposedBy();
        $form = $this->createForm(ComposedByType::class, $composedBy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $composedByRepository->save($composedBy, true);

            return $this->redirectToRoute('app_composed_by_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('composed_by/new.html.twig', [
            'composed_by' => $composedBy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_composed_by_show', methods: ['GET'])]
    public function show(ComposedBy $composedBy): Response
    {
        return $this->render('composed_by/show.html.twig', [
            'composed_by' => $composedBy,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_composed_by_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ComposedBy $composedBy, ComposedByRepository $composedByRepository): Response
    {
        $form = $this->createForm(ComposedByType::class, $composedBy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $composedByRepository->save($composedBy, true);

            return $this->redirectToRoute('app_composed_by_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('composed_by/edit.html.twig', [
            'composed_by' => $composedBy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_composed_by_delete', methods: ['POST'])]
    public function delete(Request $request, ComposedBy $composedBy, ComposedByRepository $composedByRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$composedBy->getId(), $request->request->get('_token'))) {
            $composedByRepository->remove($composedBy, true);
        }

        return $this->redirectToRoute('app_composed_by_index', [], Response::HTTP_SEE_OTHER);
    }
}
