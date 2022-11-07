<?php declare(strict_types=1);

class FuelGauge
{
    public int $fuelAmount = 0;
    public int $fuelConsumption = 100 / 10;

    public function reportFuelAmount(): string
    {
        return "Car has {$this->fuelAmount}L of fuel\n";
    }

    public function viewFuelAmount(): int
    {
        return $this->fuelAmount;
    }

    public function fuelIncrement(): void
    {
        $maxFuelAmount = 70;
        if ($this->fuelAmount !== $maxFuelAmount) {
            $this->fuelAmount++;
        }
    }

    public function fuelDecrement($milesDriven): void
    {
        $minFuelAmount = 0;

        if ($this->fuelAmount !== $minFuelAmount) {
            if ($milesDriven % $this->fuelConsumption == 0 && $milesDriven !== 0) {

                $this->fuelAmount--;
            }
        }
    }

}

class Odometer
{
    public int $mileage = 0;

    public function reportMileage(): string
    {
        return "Car has driven {$this->mileage}km total";
    }

    public function viewMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage(): int
    {
        $maxMileage = 999999;
        if ($this->mileage > $maxMileage) {
            return $this->mileage = 0;
        }
        return $this->mileage++;
    }
}


// instantiating objects
$fuelGaugeOne = new FuelGauge();
$odometerOne = new Odometer();


// Filling up the car
$fuelRefill = 4; // liters
for ($i = 0; $i < $fuelRefill; $i++) {
    $fuelGaugeOne->fuelIncrement();
}
echo "Refueled - " . $fuelGaugeOne->reportFuelAmount();


// Trip
while ($fuelGaugeOne->viewFuelAmount() > 0) {
    $fuelGaugeOne->fuelDecrement($odometerOne->viewMileage());
    $odometerOne->incrementMileage();

    echo $odometerOne->reportMileage() . " --- ";
    echo $fuelGaugeOne->reportFuelAmount();
}
