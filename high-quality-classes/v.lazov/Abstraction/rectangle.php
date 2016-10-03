<?php

include "figure.php";

class Rectangle extends Figure {
	public Rectangle($width = 0, $height = 0){
	}

	public calculate_perimeter() {
		return perimeter = 2 * ($width + $height);
	}

	public calculate_surface() {
		return surface = $width * $height;
	}
}
