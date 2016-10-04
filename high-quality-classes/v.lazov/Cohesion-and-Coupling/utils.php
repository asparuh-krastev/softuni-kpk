<?php

/**
 * Class Utils
 */
class Utils {

	/**
	 * Fetches the file extension from given filename.
	 *
	 * @param $file_name
	 *
	 * @return mixed
	 */
	public static function get_file_extension($file_name) {
		$parts = explode(".", $file_name);
		
		$last_part = $parts[count($parts) - 1];

		return $last_part;
	}

  /**
   * Fetches the file name without the extension.
   *
   * @param $file_name
   *
   * @return string
   */
	public static function get_file_name_without_extension($file_name) {
		$last_part = self::get_file_extension($file_name);
		
		return substr($file_name, 0, count($last_part) + 1);
	}

  /**
   * Calculates the distance between two points in two dimensional space.
   *
   * @param $x1
   * @param $y1
   * @param $x2
   * @param $y2
   *
   * @return float
   */
	public static function calc_distance_2d($x1, $y1, $x2, $y2) {
		return sqrt(($x2 - $x1) * ($x2 - $x1) + ($y2 - $y1) * ($y2 - $y1));
	}

  /**
   * * Calculates the distance between two points in three dimensional space.
   *
   * @param $x1
   * @param $y1
   * @param $z1
   * @param $x2
   * @param $y2
   * @param $z2
   *
   * @return float
   */
	public static function calc_distance_3d($x1, $y1, $z1, $x2, $y2, $z2) {
		return sqrt(($x2 - $x1) * ($x2 - $x1) + ($y2 - $y1) * ($y2 - $y1) + ($z2 - $z1) * ($z2 - $z1));
	}

  /**
   * Calculates the volume of a parallelogram.
   *
   * @param $width
   * @param $height
   * @param $depth
   *
   * @return mixed
   */
	public static function calc_volume_parallelogram($width, $height, $depth) {
		return $width * $height * $depth;
	}

  /**
   * Calculates the width of a parallelogram diagonal.
   *
   * @param $width
   * @param $height
   * @param $depth
   *
   * @return float
   */
	public static function calc_diagonal_xyz($width, $height, $depth) {
		return self::calc_distance_3d(0, 0, 0, $width, $height, $depth);
	}

  /**
   * Calculates the width of a diagonal XY.
   *
   * @param $width
   * @param $height
   *
   * @return float
   */
	public static function calc_diagonal_xy($width, $height) {
		return self::calc_distance_2d(0, 0, $width, $height);
	}

  /**
   * Calculates the width of a diagonal XZ.
   *
   * @param $width
   * @param $depth
   *
   * @return float
   */
	public static function calc_diagonal_xz($width, $depth) {
		return self::calc_distance_2d(0, 0, $width, $depth);
	}

  /**
   * Calculates the width of a diagonal YZ.
   *
   * @param $height
   * @param $depth
   *
   * @return float
   */
	public static function calc_diagonal_yz($height, $depth) {
		return self::calc_distance_2d(0, 0, $height, $depth);
	}
}
