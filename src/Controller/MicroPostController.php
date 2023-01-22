<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroPostController extends AbstractController
{
    #[Route('/micro-post', name: 'app_micro_post')]
    public function index(MicroPostRepository $microPostRepository): Response
    {
        /*$microPost = new MicroPost();
        $microPost->setTitle('Welcome to Germany');
        $microPost->setText('Belgium');
        $microPost->setCreated(new DateTime());
        $microPostRepository->save($microPost, true);*/

        $microPost = $microPostRepository->find(2);
        $microPost->setTitle('Welcome update');
        $microPostRepository->save($microPost, true);

        //dd($microPostRepository->findBy(['title' => 'Welcome to Mauritius']));
        return $this->render('micro_post/index.html.twig', [
            'controller_name' => 'MicroPostController',
        ]);
    }
}
