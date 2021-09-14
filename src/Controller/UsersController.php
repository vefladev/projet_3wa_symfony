<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    #[Route('/api/users', name: 'users')]
    public function index(Request $request, UserRepository $repository): Response
    {
        return $this->json($repository->search($request->query->get('q')));
    }
}
