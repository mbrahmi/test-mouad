<?php

namespace App\Controller;

use App\Manager\GenreManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GenreController extends AbstractController
{
    #[Route('/genres/{id}', name: 'genre_list')]
    public function listMovies(Request $request, HttpClientInterface $httpClient, GenreManager $genreManager): Response
    {
        $genre_id = $request->get('id');
        return $this->render(
            'movie/layout.html.twig',
            [
                'genres' => [$genreManager->getGenreById($genre_id)],
                'selected_genre' => $genre_id,
            ]
        );
    }

    public function list(Request $request, HttpClientInterface $httpClient, GenreManager $genreManager): Response
    {
        return $this->render(
            '/genre/list.html.twig',
            [
                'genres' => $genreManager->getGenres(),
            ]
        );
    }
}
