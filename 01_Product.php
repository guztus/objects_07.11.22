<?php declare(strict_types=1);

class Product
{

    public string $name;
    public float $startPrice;
    public int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct(): string
    {
        return "{$this->name}, price {$this->startPrice} EUR, amount {$this->amount}\n";
    }

    public function set_amount(int $amount): int
    {
        return $this->amount = $amount;
    }

    public function set_price(float $price): float
    {
        return $this->startPrice = $price;
    }

}

$banana = new Product('banana', 1.1, 13);
$mouse = new Product('Logitech mouse', 70.00, 14);
$iphone = new Product('iPhone 5s', 999.99, 3);
$printer = new Product('Epson EB-U05', 440.46, 1);

$banana->set_price(22.22);
$iphone->set_amount(88888);
$printer->set_amount(989);

echo $banana->printProduct();
echo $mouse->printProduct();
echo $iphone->printProduct();
echo $printer->printProduct();

