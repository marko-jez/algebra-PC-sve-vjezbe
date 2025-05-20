<?php

$primeNumbers = [2, 3, 5, 7, 11];

$postojiTreci = isset($primeNumbers[2]);
var_dump($postojiTreci);

echo "<hr>";

if ($postojiTreci) {
    echo "Treći element u nizu je: " . ($primeNumbers[2]);
} else {
    echo "Treći element u nizu ne postoji";
}
echo "<hr>";

$primeNumbers[] = 13;

$ukupnoBrojeva = count($primeNumbers);
echo "Ukupni broj elemenata u nizu je: " . $ukupnoBrojeva;
echo "<hr>";

print_r($primeNumbers);
echo "<hr>";

rsort($primeNumbers);
var_dump($primeNumbers);
echo "<hr>";