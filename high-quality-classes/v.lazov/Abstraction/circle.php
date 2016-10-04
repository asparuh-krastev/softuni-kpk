<?php

include "figure.php";

/**
 * Class Circle
 */
class Circle extends Figure {

  /**
   * @var int - The radius of the circle.
   */
	public $radius;

	public function __construct($radius = 0) {
		$this->radius = $radius;
	}

  /**
   * @inheritdoc
   *
   * @return float
   */
	public function calculate_perimeter() {
		return $perimeter = 2 * pi() * $this->radius;
	}

  /**
   * @inheritdoc
   *
   * @return float
   */
	public function calculate_surface() {
		return $surface = pi() * $this->radius * $this->radius;
	}
}
