<?php

namespace App\Model\Movie;

class Movie
{
    private int $budget;
    private int $id;
    private string $title;
    private bool $adult;

    /**
     * @var string|null
     */
    private $backdrop_path;
    private array $genre_ids;
    private string $original_language;
    private string $original_title;
    private string $overview;
    private float $popularity;
    private $poster_path;
    private string $release_date;
    private bool $video;
    private float $vote_average;
    private int $vote_count;

    /**
     * @return bool
     */
    public function isAdult(): bool
    {
        return $this->adult;
    }

    /**
     * @param bool $adult
     */
    public function setAdult(bool $adult): void
    {
        $this->adult = $adult;
    }


    /**
     * @return string
     */
    public function getBackdropPath(): string
    {
        return $this->backdrop_path;
    }


    public function setBackdropPath($backdrop_path): void
    {
        $this->backdrop_path = $backdrop_path;
    }

    /**
     * @return array
     */
    public function getGenreIds(): array
    {
        return $this->genre_ids;
    }

    /**
     * @param array $genre_ids
     */
    public function setGenreIds(array $genre_ids): void
    {
        $this->genre_ids = $genre_ids;
    }

    /**
     * @return string
     */
    public function getOriginalLanguage(): string
    {
        return $this->original_language;
    }

    /**
     * @param string $original_language
     */
    public function setOriginalLanguage(string $original_language): void
    {
        $this->original_language = $original_language;
    }

    /**
     * @return string
     */
    public function getOriginalTitle(): string
    {
        return $this->original_title;
    }

    /**
     * @param string $original_title
     */
    public function setOriginalTitle(string $original_title): void
    {
        $this->original_title = $original_title;
    }

    /**
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     */
    public function setOverview(string $overview): void
    {
        $this->overview = $overview;
    }

    /**
     * @return float
     */
    public function getPopularity(): float
    {
        return $this->popularity;
    }

    /**
     * @param float $popularity
     */
    public function setPopularity(float $popularity): void
    {
        $this->popularity = $popularity;
    }

    /**
     * @return string
     */
    public function getPosterPath(): string
    {
        return $this->poster_path;
    }

    /**
     * @param string $poster_path
     */
    public function setPosterPath($poster_path): void
    {
        $this->poster_path = $poster_path;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    /**
     * @param string $release_date
     */
    public function setReleaseDate(string $release_date): void
    {
        $this->release_date = $release_date;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->video;
    }

    /**
     * @param bool $video
     */
    public function setVideo(bool $video): void
    {
        $this->video = $video;
    }

    /**
     * @return float
     */
    public function getVoteAverage(): float
    {
        return $this->vote_average;
    }

    /**
     * @param float $vote_average
     */
    public function setVoteAverage(float $vote_average): void
    {
        $this->vote_average = $vote_average;
    }

    /**
     * @return int
     */
    public function getVoteCount(): int
    {
        return $this->vote_count;
    }

    /**
     * @param int $vote_count
     */
    public function setVoteCount(int $vote_count): void
    {
        $this->vote_count = $vote_count;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    /**
     * @return int
     */
    public function getBudget(): int
    {
        return $this->budget;
    }

    /**
     * @param int $budget
     */
    public function setBudget(int $budget): void
    {
        $this->budget = $budget;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
