<?php

include "rectagnle.php";
include "circle.php";

$circle = new Circle(5);
$circle_perimeter = $circle->calculate_perimeter();
$circle_surface = $circle->calculate_perimeter();
echo "I am a circle. My perimeter is {$circle_perimeter}. My surface is {$circle_surface}.";

$rect = new Rectangle(2, 3);
$rect_perimeter = $rect->calculate_perimeter();
$rect_surface = $rect->calculate_perimeter();

echo "I am a rectangle. My perimeter is {$rect_perimeter}. My surface is {$rect_surface}.";