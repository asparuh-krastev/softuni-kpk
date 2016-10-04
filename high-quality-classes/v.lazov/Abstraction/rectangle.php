<?php

include "figure.php";

/**
 * Class Rectangle
 */
class Rectangle extends Figure {

	public function __construct($width = 0, $height = 0){
		$this->width = $width;
		$this->height = $height;
	}

	/**
	 * @inheritdoc
	 *
	 * @return int
	 */
	public function calculate_perimeter() {
		return 2 * ($this->width + $this->height);
	}

	/**
	 * @inheritdoc
	 *
	 * @return int
	 */
	public function calculate_surface() {
		return $this->width * $this->height;
	}
}
