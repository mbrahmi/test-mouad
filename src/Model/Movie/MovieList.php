<?php

namespace App\Model\Movie;

class MovieList
{
    #[Type("array<App\Model\Movie\Movie>")]
    public array $results;
}
