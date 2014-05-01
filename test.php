<?php

use PHPMathParser\Math;

require_once 'lib/PHPMathParser/Math.php';

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

$answer = $math->evaluate('1.45 + 3');
var_dump($answer);
// float 4.45

$answer = $math->evaluate('0.45 + 3.5');
var_dump($answer);
// float 3.95

$answer = $math->evaluate('10.6 / 1.2');
var_dump($answer);
// float 8.8333333333333

$answer = $math->evaluate('(1.65 + 2) * (3.1415 + 4) * (5 + 6.8989)');
var_dump($answer);
// float 310.1623793775

$math->registerVariable('a', 5.36464);
$answer = $math->evaluate('($a + $a) * 4');
var_dump($answer);
// float 42.91712