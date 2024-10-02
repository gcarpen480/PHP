<?php

$a = true;
$b = true;
$c = false;

$a && $b; // devuelve true
$a && $c; // devuevlve false

$a = true;
$b = false;
$c = false;
$d = true;

$a || $b; // devuelve true
$b || $c; // devuelve false
$a || $d; // devuelve true

$d = true;

echo !$d; // muestra false