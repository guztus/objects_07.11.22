<?php

class Application
{
    private array $inventory;

    function run()
    {
        while (true) {
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
                    echo $this->rent_movie($wantToRent) ? "Enjoy your movie!\n" : "This movie is already rented out!\n";
                    echo "-- -- -- -- --" . PHP_EOL;

                    break;
                case 3:
                    $wantToReturn = readline("Movie to return: ");

                    echo "-- -- -- -- --" . PHP_EOL;
                    echo $this->return_movie($wantToReturn) ? "Thanks, hope you liked it!\n" : "We actually don't have this movie in our inventory...\n";
                    echo "-- -- -- -- --" . PHP_EOL;

                    $leaveARating = readline("Would you mind leaving a rating for the movie? (y\\n)\n");

                    switch ($leaveARating) {
                        case 'y':
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
                        default:
                            break;
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

    public function rent_movie($wantToRent): bool
    {
        foreach ($this->inventory as $movie) {
            if ($wantToRent == $movie->getTitle() && !$movie->getCheckedStatus()) {
                $movie->checkOut();
                return true;
            }
        }
        return false;
    }

    public function return_movie($wantToReturn): bool
    {
        foreach ($this->inventory as $movie) {
            if ($wantToReturn == $movie->getTitle() && $movie->getCheckedStatus()) {
                $movie->returnMovie();
                return true;
            }
        }
        return false;
    }

    public function list_inventory(): array
    {
        return $this->inventory;
    }
}