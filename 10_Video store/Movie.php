<?php declare(strict_types=1);

class Movie
{
    private string $title;

    private bool $isCheckedOut = false;
    private float $rating = 0;
    private float $totalRatingSores = 0;
    private int $totalTimesRated = 0;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function checkOut()
    {
        $this->isCheckedOut = true;
    }

    public function returnMovie()
    {
        $this->isCheckedOut = false;
    }

    public function addRating(float $newRating): void
    {
        $this->totalTimesRated++;
        $this->totalRatingSores += $newRating;
        $this->rating = round(($this->totalRatingSores / $this->totalTimesRated), 2);
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCheckedStatus(): bool
    {
        return $this->isCheckedOut;
    }
}