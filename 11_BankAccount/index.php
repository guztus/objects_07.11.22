<?php

require_once "Account.php";

$matts_account = new Account("Matt's account", 1000);
$my_account = new Account("My account", 0);
$matts_account->withdrawal(100);
$my_account->deposit(100);

echo $matts_account->balance() . PHP_EOL;
echo $my_account->balance() . PHP_EOL;

$a = new Account('A', 100);
$b = new Account('B', 0.00);
$c = new Account('C', 0.00);

$a->transfer($a, $b, 50.0);
$b->transfer($b, $c, 25.0);

echo $a->balance() . PHP_EOL;
echo $b->balance() . PHP_EOL;
echo $c->balance() . PHP_EOL;


$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartos_account . PHP_EOL;
echo $bartos_swiss_account . PHP_EOL;
echo PHP_EOL;


$bartos_account->withdrawal(20);
echo "Barto's account balance is now: " . $bartos_account->balance() . PHP_EOL;
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: ".$bartos_swiss_account->balance() . PHP_EOL;
echo PHP_EOL;


echo "Final state" . PHP_EOL;
echo $bartos_account . PHP_EOL;
echo $bartos_swiss_account . PHP_EOL;
echo PHP_EOL;
