<?php declare(strict_types=1);

require_once "DogTest.php";

$max = new DogTest ("Max", "male");
$rocky = new DogTest ("Rocky", "male");
$sparky = new DogTest ("Sparky", "male");
$buster = new DogTest ("Buster", "male");
$sam = new DogTest ("Sam", "male");
$lady = new DogTest ("Lady", "female");
$molly = new DogTest ("Molly", "female");
$coco = new DogTest ("Coco", "female");

$max->setMother($lady)->setFather($rocky);
$coco->setMother($molly)->setFather($buster);
$rocky->setMother($molly)->setFather($sam);
$buster->setMother($lady)->setFather($sparky);

echo $coco->fathersName();
echo $sparky->fathersName();

echo $coco->hasSameMotherAs($rocky); // returns true ("1" in console)
echo $coco->hasSameMotherAs($buster); // returns false (nothing in console)