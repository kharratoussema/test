<?php

namespace App\Controller;

use App\Entity\Pointeuse;
use App\Form\PointeuseType;
use App\Repository\PointeuseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * @Route("/pointeuse")
 */
class PointeuseController extends AbstractController
{
    /**
     * @Route("/", name="pointeuse_index", methods={"GET"})
     */
    public function index(PointeuseRepository $pointeuseRepository): Response
    {
        return $this->render('pointeuse/index.html.twig', [
            'pointeuses' => $pointeuseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pointeuse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pointeuse = new Pointeuse();
        $form = $this->createForm(PointeuseType::class, $pointeuse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
           // return print_r($form);
            $entityManager->persist($pointeuse);
            $entityManager->flush();

            return $this->redirectToRoute('pointeuse_index');
        }

        return $this->render('pointeuse/new.html.twig', [
            'pointeuse' => $pointeuse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pointeuse_show", methods={"GET"})
     */
    public function show(Pointeuse $pointeuse): Response
    {      
        return $this->render('pointeuse/show.html.twig', [
            'pointeuse' => $pointeuse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pointeuse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pointeuse $pointeuse): Response
    {
        $form = $this->createForm(PointeuseType::class, $pointeuse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pointeuse_index');
        }

        return $this->render('pointeuse/edit.html.twig', [
            'pointeuse' => $pointeuse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pointeuse_delete", methods={"POST"})
     */
    public function delete(Request $request, Pointeuse $pointeuse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pointeuse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pointeuse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pointeuse_index');
    }

   
}
