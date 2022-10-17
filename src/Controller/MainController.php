<?php

namespace App\Controller;

use App\Manager\GenreManager;
use App\Manager\MovieManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(MovieManager $movieManager, GenreManager $genreManager): Response
    {
        return $this->render(
            'movie/layout.html.twig',
            [
                'genres' => [],
            ]
        );
    }
}
