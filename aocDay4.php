<?php

include_once 'bootstrap.php';

$from = '284639';
$to = '748759';

$adventOfCodeController = new \Controllers\AdventOfCodeController();
$result = $adventOfCodeController->day4Puzzle($from, $to);

echo print_r($result, true) . PHP_EOL;