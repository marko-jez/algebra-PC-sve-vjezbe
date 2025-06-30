<?php

include_once 'Math/Constants.php';
include_once 'Math/Geometry/Circle.php';

$circle = new Math\Geometry\Circle(7);

echo $circle->getDiameter();
echo "<br>";
echo $circle->getArea();
echo "<br>";
echo $circle->getCircumference();
echo "<br>";

use Math\Geometry\Circle;

$circle2 = new Circle(5);
echo $circle2->getDiameter();

echo "<br>";
echo "<br>";

use Math\Geometry\Circle as C;

$circle3 = new C(2);
echo $circle3->getDiameter();