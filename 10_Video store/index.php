<?php

require_once 'Application.php';
require_once 'Movie.php';

$app = new Application();

$tarzan = new Movie('Tarzan');
$pulpFiction = new Movie('Pulp Fiction');


$app->add_movies($tarzan);
$app->add_movies($pulpFiction);

$pulpFiction->addRating(10);
$pulpFiction->addRating(8);
$pulpFiction->addRating(8);

//echo $pulpFiction->getRating();
// rating should be 8.67 -- and it is

$tarzan->checkOut();
//echo $tarzan->getRating();


//var_dump($app->rent_movie('Pulp Fiction'));

$app->run();