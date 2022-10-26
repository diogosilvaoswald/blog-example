<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;
use App\Entity\Post;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="app_site")
     */
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('index.html.twig', [
            'posts' => $postRepository->findBy(['published' => true]),
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/{slug}", name="app_site_show", methods={"GET"})
     */
    public function show(Post $post): Response
    {
        return $this->render('show.html.twig', [
            'post' => $post,
        ]);
    }
}
