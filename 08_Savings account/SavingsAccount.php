<?php declare(strict_types=1);

class SavingsAccount
{
    private float $balance;

    public function __construct($startingBalance)
    {
        $this->balance = $startingBalance;
    }

    public function withdraw($withdrawAmount): void
    {
            $this->balance -= $withdrawAmount;
    }

    public function deposit($depositAmount): void
    {
        $this->balance += $depositAmount;
    }

    public function addMonthlyInterest($annualInterest): void
    {
        $this->balance += round($this->balance * ($annualInterest / 12), 2);
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}
