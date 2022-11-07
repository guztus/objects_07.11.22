<?php declare(strict_types=1);

require_once 'Date.php';

$date1 = new Date(01,11,2023);
echo $date1->displayDate();

$date2 = new Date(11,10,2012);
echo $date2->displayDate();

$date3 = new Date(12,23,2330);
echo $date3->displayDate();

//$date4 = new Date(132,23,2330);
//echo $date4->displayDate();