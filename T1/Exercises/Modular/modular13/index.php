<?php
/*
 * Determinar en un programa modular si un número introducido por teclado es
 * primo o no. Un número primo solo es divisible por él mismo y por la unidad.
 * */

require_once 'primeNumbers.php';

$num = 3;

if (checkIfIsPrime($num)) {
    echo 'El numero ' . $num . ' es primo';
}