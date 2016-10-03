<?php

class Utils {
	public static get_file_extension($file_name) {
		$parts = explode(".", $file_name);
		
		$last_part = $parts[count($parts) - 1];

		return $last_part;
	}

	public static get_file_name_without_extension($file_name) {
		$last_part = self::get_file_extension($file_name);
		
		return substr($file_name, 0, count($last_part) + 1);
	}

	public static calc_distance_2d($x1, $y1, $x2, $y2) {
		return sqrt(($x2 - $x1) * ($x2 - $x1) + ($y2 - $y1) * ($y2 - $y1));
	}

	public static calc_distance_3d($x1, $y1, $z1, $x2, $y2, $z2) {
		return sqrt(($x2 - $x1) * ($x2 - $x1) + ($y2 - $y1) * ($y2 - $y1) + ($z2 - $z1) * ($z2 - $z1));
	}

	public static calc_volume_parallelogram($widht, $height, $depth) {
		return $width * $height * $depth;
	}

	public static calc_diagonal_xyz($widht, $height, $depth) {
		return self::calc_distance_3d(0, 0, 0, $widht, $height, $depth);
	}

	public static calc_diagonal_xy() {
		return self::calc_distance_2d(0, 0, $widht, $height);
	}

	public static calc_diagonal_xz() {
		return self::calc_distance_2d(0, 0, $widht, $depth);
	}

	public static calc_diagonal_yz() {
		return self::calc_distance_2d(0, 0, $height, $depth);
	}
}
