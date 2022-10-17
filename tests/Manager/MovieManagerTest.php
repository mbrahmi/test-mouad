<?php

namespace Manager;

use App\Client\WeMoviesClient;
use App\Manager\MovieManager;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MovieManagerTest extends KernelTestCase
{

    public function testGetMovies()
    {
        self::bootKernel();

        $movieManager = new MovieManager(
            $this->createMock(WeMoviesClient::class),
            (static::getContainer())->get(SerializerInterface::class)
        );

        $expected = '';

        self::assertEquals(
            $expected,
            $movieManager->getMovies()
        );

    }

}
