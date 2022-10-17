<?php

namespace App\Manager;

use App\Client\WeMoviesClient;
use App\Model\Genre\GenreList;
use Symfony\Component\Serializer\SerializerInterface;

class GenreManager
{
    public function __construct(private WeMoviesClient $weMoviesClient, private SerializerInterface $serializer)
    {
    }

    public function getGenres(): array
    {
        return $this->serializer->deserialize(
            $this->weMoviesClient->getGenres(),
            GenreList::class,
            'json'
        )->genres;
    }

    public function getGenreById(string $id = null): array
    {
        return array_filter($this->getGenres(), function ($v) use ($id) {
            return $v['id'] == $id;
        });
    }
}
