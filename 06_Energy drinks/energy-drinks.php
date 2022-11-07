<?php declare(strict_types=1);

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed, float $purchased_energy_drinks): int
{
    return intval(floor($numberSurveyed * $purchased_energy_drinks));
}

function calculate_prefer_citrus(int $energyDrinkers, float $prefer_citrus_drinks): int
{
    return intval(floor($energyDrinkers * $prefer_citrus_drinks));
}

$energyDrinkerAmount = calculate_energy_drinkers($surveyed, $purchased_energy_drinks);
$drinkersPreferringCitrus = calculate_prefer_citrus($energyDrinkerAmount, $prefer_citrus_drinks);

echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . $energyDrinkerAmount . " bought at least one energy drink" . PHP_EOL;
echo $drinkersPreferringCitrus . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;
