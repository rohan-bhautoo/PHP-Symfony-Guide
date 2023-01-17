<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hello', name: 'app_hello')]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
        ]);
    }

    #[Route('/hello/{id<\d+>}', name: 'app_id')]
    public function showId(int $id): Response
    {
        return new Response($id);
    }

    #[Route('/limit/{id<\d+>?1}', name: 'app_limit')]
    public function showOne(int $id): Response
    {
        return new Response($id);
    }
}
