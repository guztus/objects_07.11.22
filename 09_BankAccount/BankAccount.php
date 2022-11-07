<?php declare(strict_types=1);

class BankAccount
{
    private string $userName;
    private float $balance = 0;

    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    function show_user_name_and_balance(): string
    {
        $nameSentence = "{$this->userName}, ";

        $balanceFormatted = abs($this->balance);
        $balanceSentence = "$" . number_format($balanceFormatted, 2, '.', ',');

        if ($this->balance < 0) {
            return $nameSentence . "-" . $balanceSentence . PHP_EOL;
        }
        return $nameSentence . $balanceSentence . PHP_EOL;
    }

    public function withdraw(float $withdrawAmount): void
    {
        $this->balance -= $withdrawAmount;
    }

    public function deposit(float $depositAmount): void
    {
        $this->balance += $depositAmount;
    }
}

