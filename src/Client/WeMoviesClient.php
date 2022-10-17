<?php

namespace App\Client;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeMoviesClient
{
    private const API_KEY = '865a805e946243fa16a121951794066b';

    public function __construct(private HttpClientInterface $weMoviesClient)
    {
    }

    public function getPopularMovies(array $query = [])
    {
        return $this->getApiContent(
            '3/movie/popular',
            [
                'query' => $query
            ]
        );
    }

    public function getApiContent(string $url, array $options): string
    {
        $response = $this->weMoviesClient->request(Request::METHOD_GET, $url, $options);

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            throw new BadRequestHttpException($response->getContent());
        }

        return $response->getContent();
    }

    public function getMovie(string $movieId)
    {
        return $this->getApiContent(
            sprintf('3/movie/%s', $movieId),
            []
        );
    }

    public function getGenres(array $query = [])
    {
        return $this->getApiContent(
            '3/genre/movie/list',
            [
                'query' => $query
            ]
        );
    }

    public function getMovieVideos(string $movieId)
    {
        return $this->getApiContent(
            sprintf('3/movie/%s/videos', $movieId),
            []
        );
    }

    public function searchMovies(array $query)
    {
        return $this->getApiContent(
            '3/search/movie',
            [
                'query' => $query
            ]
        );
    }
}
