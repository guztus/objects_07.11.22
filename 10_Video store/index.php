<?php

require_once 'Application.php';
require_once 'Movie.php';

$app = new Application();

$matrix = new Movie('The Matrix');
$godfather = new Movie('Godfather II');
$starWarsIV = new Movie('Star Wars Episode IV: A New Hope');

$app->add_movies($matrix);
$app->add_movies($godfather);
$app->add_movies($starWarsIV);

$matrix->addRating(10);
$matrix->addRating(8);
$matrix->addRating(8);
$godfather->addRating(10);
$starWarsIV->addRating(3);

$matrix->checkOut();
$matrix->returnMovie();

$starWarsIV->checkOut();

$godfather->checkOut();


$app->run(); // list using this