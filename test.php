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