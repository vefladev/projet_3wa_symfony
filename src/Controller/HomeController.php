<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Training;
use App\Repository\UserRepository;
use App\Repository\TrainingRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/admin/index", name="home_admin_index")
     * @IsGranted("ROLE_USER")
     */
    public function adminIndex()
    {

        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('home_admin');
        } else if ($this->isGranted('ROLE_COACH')) {
            return $this->redirectToRoute('home_coach');
        } else if ($this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('home_adherent');
        }
    }

    /**
     * @Route("/admin", name="home_admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function admin(UserRepository $repo)
    {
        return $this->render('home/admin.html.twig', [
            'users' => $repo->findAll()

        ]);
    }

    /**
     * @Route("/admin/coach", name="home_coach")
     * @IsGranted("ROLE_COACH")
     */
    public function coach()
    {
        return $this->render('home/coach.html.twig', []);
    }


    /**
     * @Route("/adherent", name="home_adherent")
     */
    public function adherent()
    {
        return $this->render('home/adherent.html.twig', []);
    }

    /**
     * @Route("/adherent/{id}", name="show_user", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/adherent/training/{id}", name="index_training_user", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function indexTrainingUser(TrainingRepository $trainingRepository, Request $request): Response
    {

        return $this->render('user/show_training.html.twig', [
            'trainings' => $trainingRepository->findAll()
            // 'pagination' => $paginator,
        ]);
    }

    /**
     * @Route("/adherent/training/show/{id}", name="show_user_training", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function showTrainingUser(Training $training): Response
    {
        return $this->render('training/show.html.twig', [
            'training' => $training,
        ]);
    }
}
