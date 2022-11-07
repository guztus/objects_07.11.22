<?php declare(strict_types=1);

require_once 'Movie.php';

function getPG(array $movies, string $rating): array
{
    return array_filter($movies, function (Movie $movie) use ($rating) {
        return $movie->getRating() == $rating;
    });
}

$movieList [] = $movie1 = new Movie("Casino Royale", "Eon Productions", "PG13");
$movieList [] = $movie2 = new Movie("Glass", "Buena Vista International", "PG13");
$movieList [] = $movie3 = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");

echo "Choose which movies to display (by rating): ";
$userChoice = (string) readline();
$movieSelection = getPG($movieList, $userChoice);

foreach($movieSelection as $selectedMovie) {
    echo $selectedMovie->getTitle() . PHP_EOL;
}
