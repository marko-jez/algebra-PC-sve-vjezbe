<?php

include 'autoload.php';

use Vegetables\Carrot;
use Vegetables\Potato;
use Vegetables\Tomato;

$mrkva = new Carrot();
$krumpir = new Potato();
$paradajz = new Tomato();

echo $mrkva->ime;
echo "<br>";
echo $krumpir->ime;
echo "<br>";
echo $paradajz->ime;