<?php

class Account
{
    private string $accountName;
    private float $balance;

    public function __construct(string $accountName, float $startingBalance)
    {
        $this->accountName = $accountName;
        $this->balance = $startingBalance;
    }

    public function __toString()
    {
        return "{$this->accountName}, Balance: {$this->balance}";
    }

    public function balance(): float
    {
        return $this->balance;
    }

    public function withdrawal(float $withdrawAmount)
    {
        $this->balance -= $withdrawAmount;
    }

    public function deposit(float $depositAmount)
    {
        $this->balance += $depositAmount;
    }

    public function transfer(Account $from, Account $to, int $howMuch): bool
    {
        if ($from === $this) {
            $from->withdrawal($howMuch);
            $to->deposit($howMuch);
            return true;
        } else {
            return false;
        }
    }
}