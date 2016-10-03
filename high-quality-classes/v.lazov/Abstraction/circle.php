<?php

include "figure.php";

class Circle extends Figure {
	public $radius;

	public __construct($radius = 0) {
		$this->radius = $radius;
	}

	public calculate_perimeter() {
		return perimeter = 2 * pi() * $this->radius;
	}

	public calculate_surface() {
		return surface = pi() * $this->radius * $this->radius;
	}
}
