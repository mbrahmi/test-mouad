<?php

namespace App\Model\Genre;

class GenreList
{
    #[Type("array<App\Model\Genre\Genre>")]
    public array $genres;
}
