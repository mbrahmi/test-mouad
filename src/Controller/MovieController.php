<?php

namespace App\Controller;

use App\Manager\MovieManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    public function __construct(private MovieManager $movieManager)
    {
    }

    #[Route('/movies/{id}', name: 'movie_detail')]
    public function detail(Request $request, MovieManager $movieManager): Response
    {
        return $this->render(
            'movie/detail.html.twig',
            [
                'movie'  => $movieManager->getMovieDetail($request->get('id')),
                'video' => $movieManager->getMovieVideo($request->get('id')),
            ]
        );
    }

    #[Route('/search', name: 'movie_search')]
    public function search(Request $request, MovieManager $movieManager): Response
    {
        $movies = $movieManager->searchMovies(['query' => $request->get('query')]);
        $leadMovie = array_shift($movies);
        return $this->render(
            'movie/list.html.twig',
            [
                'lead_movie' => $leadMovie,
                'lead_movie_video' => $movieManager->getMovieVideo($leadMovie->getId()),
                'movies' => $movies,
            ]
        );
    }

    public function list(MovieManager $movieManager, string $genre_id = null): Response
    {
        $query = $genre_id ? ['with_genres' => $genre_id] : [];
        $movies = $movieManager->getMovies($query);
        $leadMovie = array_shift($movies);

        return $this->render(
            'movie/list.html.twig',
            [
                'lead_movie' => $leadMovie,
                'lead_movie_video' => $movieManager->getMovieVideo($leadMovie->getId()),
                'movies' => $movies,
            ]
        );
    }
}
