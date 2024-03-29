<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Form\MicroPostType;
use App\Repository\MicroPostRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function add(Request $request, MicroPostRepository $microPostRepository): Response
    {
        $form = $this->createForm(MicroPostType::class, new MicroPost());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $microPost = $form->getData();
            $microPost->setCreated(new DateTime());
            $microPostRepository->save($microPost, true);

            // Flash Message
            $this->addFlash('success', 'Your micro post has been added!');

            // Redirect Page
            return $this->redirectToRoute('app_micro_post');
        }

        return $this->render('micro_post/_add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/micro-post/{microPost}/edit', name: 'app_micro_post_edit')]
    public function edit(MicroPost $microPost, Request $request, MicroPostRepository $microPostRepository): Response
    {
        $form = $this->createForm(MicroPostType::class, new MicroPost());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $microPost = $form->getData();
            $microPostRepository->save($microPost, true);

            // Flash Message
            $this->addFlash('success', 'Your micro post has been edited!');

            // Redirect Page
            return $this->redirectToRoute('app_micro_post');
        }

        return $this->render('micro_post/_edit.html.twig', [
            'form' => $form,
        ]);
    }
}
