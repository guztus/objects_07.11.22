<?php declare(strict_types=1);

require_once "SavingsAccount.php";

function formatMoney(float $money, string $currency = "$"): string
{
    $moneyFormatted = abs($money);
    $sentence = "{$currency}" . number_format($moneyFormatted, 2, '.', ',');

    if ($money < 0) {
        return "-" . $sentence;
    }
    return $sentence;
}

echo "How much money is in the account?: ";
$account1 = new SavingsAccount((int)readline());

echo "Enter the annual interest rate: ";
$monthlyInterest = (int)readline();

echo "How long has the account been opened? ";
$accountOpened = (int)readline();

$totalDeposited = 0;
$totalWithdrawn = 0;
$totalInterestEarned = 0;

for ($i = 1; $i <= $accountOpened; $i++) {
    echo "Enter amount deposited for month: {$i}: ";
    $userDeposit = (int)readline();

    $totalDeposited += $userDeposit;
    $account1->deposit($userDeposit);

    echo "Enter amount withdrawn for: {$i} ";
    $userWithdraw = (int)readline();

    $totalWithdrawn += $userWithdraw;
    $account1->withdraw($userWithdraw);


    $totalInterestEarned += round(($account1->getBalance() * ($monthlyInterest / 12)), 2);
    $account1->addMonthlyInterest($monthlyInterest);
}

echo "Total deposited: " . formatMoney($totalDeposited) . PHP_EOL;

echo "Total withdrawn: " . formatMoney($totalWithdrawn) . PHP_EOL;

echo "Interest earned: " . formatMoney($totalInterestEarned) . PHP_EOL;

echo "Ending balance: " . formatMoney($account1->getBalance()) . PHP_EOL;
