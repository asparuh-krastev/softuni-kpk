<?php

abstract class Figure {
	public virtual $width;
	public virtual $height;
	public virtual $radius

	/* check for constructor overloading */
	public Figure() {}

	public Figure($radius) {
		$this->$radius = $radius;
	}

	public Figure($width, $height) {
		$this->width = $width;
		$this->height = $height;
	}
}
