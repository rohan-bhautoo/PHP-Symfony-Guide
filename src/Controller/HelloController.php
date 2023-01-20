<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $test = [
        ['test' => 1, 'created' => '2023/01/20'],
        ['test' => 2, 'created' => '2022/12/24'],
        ['test' => 3, 'created' => '2021/09/22']
    ];

    #[Route('/hello', name: 'app_hello')]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
            'tests' => $this->test,
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
