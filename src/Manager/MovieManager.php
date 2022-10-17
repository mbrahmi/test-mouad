<?php

namespace App\Manager;

use App\Client\WeMoviesClient;
use App\Model\Movie\Movie;
use App\Model\Movie\MovieList;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieManager
{
    private const API_BASE_URL = 'https://api.themoviedb.org/3';
    private const API_KEY = '865a805e946243fa16a121951794066b';

    public function __construct(private HttpClientInterface $httpClient, private WeMoviesClient $weMoviesClient, private SerializerInterface $serializer)
    {
    }

    public function getMovies(array $query = []): array
    {
        $movies  = [];
        $results = json_decode($this->weMoviesClient->getPopularMovies($query))->results;

        foreach ($results as $result) {
            $movies[] = $this->serializer->deserialize(
                json_encode($result),
                Movie::class,
                'json'
            );
        }
        return $movies;
    }

    public function getMovieVideo(string $movieId)
    {
        $videos = json_decode($this->weMoviesClient->getMovieVideos($movieId))->results;
        return $videos[0]??null;
    }

    public function getMovieDetail(string $movieId)
    {
        return $this->serializer->deserialize(
            $this->weMoviesClient->getMovie($movieId),
            Movie::class,
            'json'
        );
    }

    public function searchMovies(array $query)
    {
        $movies  = [];
        $results = json_decode($this->weMoviesClient->searchMovies($query))->results;

        foreach ($results as $result) {
            $movies[] = $this->serializer->deserialize(
                json_encode($result),
                Movie::class,
                'json'
            );
        }
        return $movies;
    }
}
