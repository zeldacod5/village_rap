<?php

namespace App\Controller;

use App\Entity\Prepared;
use App\Form\PreparedType;
use App\Repository\PreparedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/prepared')]
class PreparedController extends AbstractController
{
    #[Route('/', name: 'app_prepared_index', methods: ['GET'])]
    public function index(PreparedRepository $preparedRepository): Response
    {
        return $this->render('prepared/index.html.twig', [
            'prepareds' => $preparedRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_prepared_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PreparedRepository $preparedRepository): Response
    {
        $prepared = new Prepared();
        $form = $this->createForm(PreparedType::class, $prepared);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $preparedRepository->save($prepared, true);

            return $this->redirectToRoute('app_prepared_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prepared/new.html.twig', [
            'prepared' => $prepared,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_prepared_show', methods: ['GET'])]
    public function show(Prepared $prepared): Response
    {
        return $this->render('prepared/show.html.twig', [
            'prepared' => $prepared,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_prepared_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Prepared $prepared, PreparedRepository $preparedRepository): Response
    {
        $form = $this->createForm(PreparedType::class, $prepared);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $preparedRepository->save($prepared, true);

            return $this->redirectToRoute('app_prepared_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prepared/edit.html.twig', [
            'prepared' => $prepared,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_prepared_delete', methods: ['POST'])]
    public function delete(Request $request, Prepared $prepared, PreparedRepository $preparedRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prepared->getId(), $request->request->get('_token'))) {
            $preparedRepository->remove($prepared, true);
        }

        return $this->redirectToRoute('app_prepared_index', [], Response::HTTP_SEE_OTHER);
    }
}
