<?php declare(strict_types=1);

require_once 'Car.php';
require_once 'Odometer.php';
require_once 'FuelGauge.php';

$audi = new Car(
    new FuelGauge(5),
    new Odometer()
);

$bmw = new Car(
    new FuelGauge(2),
    new Odometer()
);

$car = $bmw;

while ($car->getfuelGauge()->getAmount() > 0) {
    echo "We drove 1km" . PHP_EOL;
    echo "Removing 1 liter." . PHP_EOL;

    $car->drive();
    echo "FuelGauge: {$car->getFuelGauge()->getAmount()} / Odometer: {$car->getOdometer()->getMileage()}\n";

//    sleep(1);
}