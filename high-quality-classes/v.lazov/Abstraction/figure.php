<?php

/**
 * Class Figure
 *
 * An abstraction of a figure.
 */
abstract class Figure {
	public $width;
	public $height;
	public $radius;

  /**
   * A method for calculating the perimeter of the figure.
   *
   * @return mixed
   */
  public abstract function calculate_perimeter();

  /**
   * A method for calculating the surface of the figure.
   *
   * @return mixed
   */
  public abstract function calculate_surface();
}
