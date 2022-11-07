<?php declare(strict_types=1);

require_once "BankAccount.php";

$ben = new BankAccount('Benson');
$ben->deposit(17.5);

echo $ben->show_user_name_and_balance();

$ben->withdraw(35);
echo $ben->show_user_name_and_balance();
