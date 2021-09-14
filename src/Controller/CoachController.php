<?php

namespace App\Controller;

use App\Entity\Coach;
use App\Form\CoachType;
use App\Repository\CoachRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CoachController extends AbstractController
{
    /**
     * @Route("/admin/coach_index", name="coach_index",  methods={"GET"})
     */
    public function index(CoachRepository $repo): Response
    {
        return $this->render('coach/index.html.twig', [
            'coach' => $repo->findAll()
        ]);
    }
    /**
     * @Route("/new", name="coach_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $coach = new Coach();
        $form = $this->createForm(CoachType::class, $coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coach);
            $entityManager->flush();

            return $this->redirectToRoute('training_index');
        }

        return $this->render('coach/new.html.twig', [
            'coach' => $coach,
            'form' => $form->createView(),
        ]);
    }
}
