<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroPostController extends AbstractController
{
    #[Route('/micro-post', name: 'app_micro_post')]
    public function index(MicroPostRepository $microPostRepository): Response
    {
        return $this->render('micro_post/index.html.twig', [
            'posts' => $microPostRepository->findAll(),
        ]);
    }

    #[Route('/micro-post/{microPost}', name: 'app_micro_post_show')]
    public function showOne(MicroPost $microPost): Response
    {
        return $this->render('micro_post/_show.html.twig', [
            'post' => $microPost
        ]);
    }

    #[Route('/micro-post/add', name: 'app_micro_post_add', priority: 2)]
    public function add(): Response
    {
        $microPost = new MicroPost();
        $form = $this->createFormBuilder($microPost)
        ->add('title')
        ->add('text')
        ->add('submit', SubmitType::class, ['label' => 'Save'])
        ->getForm();

        return $this->render('micro_post/_add.html.twig', [
            'form' => $form,
        ]);
    }
}
