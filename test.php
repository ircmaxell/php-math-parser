<?php

require_once 'Math.php';

$math = new Math();

$answer = $math->evaluate('(2 + 3) * 4');
var_dump($answer);
// int(20)

$answer = $math->evaluate('1 + 2 * ((3 + 4) * 5 + 6)');
var_dump($answer);
// int(83)

$answer = $math->evaluate('(1 + 2) * (3 + 4) * (5 + 6)');
var_dump($answer);
// int(231)

$math->registerVariable('a', 4);
$answer = $math->evaluate('($a + 3) * 4');
var_dump($answer);
// int(28)

$math->registerVariable('a', 5);
$answer = $math->evaluate('($a + $a) * 4');
var_dump($answer);
// int(40)
