<?php

class Application
{
    private array $inventory;

    function run()
    {
        while (true) {
            echo PHP_EOL;
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill movie store\n";
            echo "Choose 2 to rent movie (as user)\n";
            echo "Choose 3 to return movie (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $moviesToAdd = new Movie (readline("Movie to add: "));

                    $this->add_movies($moviesToAdd);
                    break;
                case 2:
                    $wantToRent = readline("Movie to rent: ");

                    echo "-- -- -- -- --" . PHP_EOL;
                    echo $this->rent_movie($wantToRent) ? "Enjoy your movie!\n" : "This movie is not available!\n";
                    echo "-- -- -- -- --" . PHP_EOL;

                    break;
                case 3:
                    $wantToReturn = readline("Movie to return: ");
                    echo "-- -- -- -- --" . PHP_EOL;

                    if ($this->return_movie($wantToReturn) instanceof Movie) {
                        echo "Thanks, hope you liked it!\n";
                    } else {
                        echo "This movie hasn't been rented out...\n";
                        echo "-- -- -- -- --" . PHP_EOL;
                        break;
                    }

                    echo "-- -- -- -- --" . PHP_EOL;

                    $correctFormat = false;
                    while (!$correctFormat) {
                        $userRating = readline("Rate it from 1 to 10 ");
                        if ($userRating <= 0 || $userRating > 10) {
                            continue;
                        } else {
                            foreach ($this->inventory as $movie) {
                                if ($movie->getTitle() == $wantToReturn) {
                                    $movie->addRating($userRating);
                                }
                            }
                            $correctFormat = true;
                        }
                    }

                    break;
                case 4:
                    $movies = $this->list_inventory();

                    echo "-- -- -- -- --" . PHP_EOL;
                    echo "Movies: " . PHP_EOL;
                    echo "-- -- -- -- --" . PHP_EOL;

                    foreach ($movies as $movie) {
                        $movieRating = $movie->getRating();
                        $isCheckedOut = $movie->getCheckedStatus();

                        if ($movieRating == null) {
                            $movieRating = "(not rated yet)";
                        }

                        $isCheckedOut = (!$isCheckedOut) ? "+ available" : "- rented out";

                        echo "Title: {$movie->getTitle()}  Rating: {$movieRating}  {$isCheckedOut}" . PHP_EOL;
                    }

                    echo "-- -- -- -- --" . PHP_EOL;

                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    public function add_movies(Movie $movie): void
    {
        $this->inventory [] = $movie;
    }

    public function rent_movie($wantToRent): ?Movie
    {
        foreach ($this->inventory as $movie) {
            if ($wantToRent == $movie->getTitle() && !$movie->getCheckedStatus()) {
                return $movie;
            }
        }
        return null;
    }

    public function return_movie($wantToReturn): ?Movie
    {
        foreach ($this->inventory as $movie) {
            if ($wantToReturn == $movie->getTitle() && $movie->getCheckedStatus()) {
                return $movie;
            }
        }
        return null;
    }

    public function list_inventory(): array
    {
        return $this->inventory;
    }
}