<?php

/**
 * Class Helper
 */
class Helper {
  /**
   * Calculates the area of a triangle based on 3 sides.
   *
   * @param $a
   * @param $b
   * @param $c
   *
   * @return float|string The area of the triangle
   */
  static function calculate_triangle_area($a, $b, $c) {
    if ($a <= 0 || $b <= 0 || $c <= 0) {
      return "Sides should be positive numbers.";
    }

    $perimeter = ($a + $b + $c) / 2;
    $area = sqrt($perimeter * ($perimeter - $a) * ($perimeter - $b) * ($perimeter - $c));

    return $area;
  }

  /**
   * Outputs the name of a given number.
   *
   * @param $number
   *    A number
   *
   * @return string
   *    The name of the given number or error string.
   */
  static function digit_to_string($number) {
    switch ($number) {
      case 0:
        return "zero";
      case 1:
        return "one";
      case 2:
        return "two";
      case 3:
        return "three";
      case 4:
        return "four";
      case 5:
        return "five";
      case 6:
        return "six";
      case 7:
        return "seven";
      case 8:
        return "eight";
      case 9:
        return "nine";
    }

    return "Invalid digit!";
  }

  /**
   * Finds the maximum number in array.
   *
   * @param $elements
   *    Array of numbers
   *
   * @return string
   *    The maximum number in the array or an error string.
   */
  static function find_max_number($elements) {
    if (!$elements || empty($elements)) {
      return "The elements array is empty or does not exist.";
    }

    $max = $elements[0];

    for ($i = 1; $i < count($elements) - 1; $i++) {
      if ($elements[$i] > $max) {
        $max = $elements[$i];
      }
    }

    return $max;
  }

  /**
   * Prints a formatted number
   *
   * @param $number
   * @param $format
   *
   * @return string
   */
  static function print_formatted_number($number, $format) {
    if (!is_numeric($number)) {
      return "You must pass an number!";
    }

    switch ($format) {
      case "f":
        return number_format($number, 2, ',', ' ');
      case "%":
        return "Another number format.";
      case "r":
        return "Yet another number format.";
      default:
        return "Format not defined.";
    }
  }

  /**
   * Calculates the distance between two points.
   *
   * @param $x1
   * @param $y1
   * @param $x2
   * @param $y2
   *
   * @return float
   */
  static function calculate_distance($x1, $y1, $x2, $y2) {
    /*
    WTF C# shit ...
    isHorizontal = (y1 == y2);
    isVertical = (x1 == x2); */

    return $distance = sqrt(($x2 - $x1) * ($x2 - $x1) + ($y2 - $y1) * ($y2 - $y1));
  }
}

function please_do_observe() {
  echo Helper::calculate_triangle_area(3, 4, 5));
	
	echo Helper::digit_to_string(5);
	
	echo Helper::find_max_number([5, -1, 3, 2, 14, 2, 3]);
	
	echo Helper::print_formatted_number(1.3, "f");
	echo Helper::print_formatted_number(0.75, "%");
	echo Helper::print_formatted_number(2.30, "r");
	
	echo Helper::calculate_distance(3, -1, 3, 2.5);
	
	include "student.php";
	
	$student1 = new Student("Peter", "Ivanov");
	$student1->other_info = "From Sofia";
	$student1->birth_date = "17.03.1992";

	$student2 = new Student("Stella", "Markova");
	$student2->other_info = "From Vidin, gamer, high results";
	$student2->birth_date = "03.11.1993";
	
	if ($student1->is_older_than($student2)) {
    echo "{$student1->first_name} is older than {$student2->first_name}";
  } else {
    echo "{$student1->first_name} is not older than {$student2->first_name}";
  }
}