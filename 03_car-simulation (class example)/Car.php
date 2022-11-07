<?php declare(strict_types=1);

class Car
{
    private FuelGauge $fuelGauge;
    private Odometer $odometer;

    public function __construct(
        FuelGauge $fuelGauge,
        Odometer  $odometer
    )
    {
        $this->fuelGauge = $fuelGauge;
        $this->odometer = $odometer;
    }

    public function drive()
    {
        $this->odometer->increment();

        if ($this->odometer->getMileage() % 10 === 0) {
            $this->fuelGauge->use();
        }
    }

    public function getFuelGauge(): FuelGauge
    {
        return $this->fuelGauge;
    }

    public function getOdometer(): Odometer
    {
        return $this->odometer;
    }
}