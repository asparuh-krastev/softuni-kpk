<?php

include "course.php";

/**
 * Class OffsiteCourse
 */
class OffsiteCourse extends Course {
  /**
   * Town
   *
   * @var null
   */
  public $town = null;

  public function __construct($course_name = '', $teacher_name = '', $students = []) {
    parent::__consatruct($course_name, $teacher_name, $students);
    $this->Lab = null;
  }

  /**
   * Returns the OffsiteCourse object as a string representation.
   *
   * @return string
   */
  public function to_string() {
    $result = '';
    $result .= "OffsiteCourse { Name = {$this->name}";

    if ($this->teacher_name != null) {
      $result .= "; Teacher = ";
      $result .= $this->teacher_name;
    }

    $result .= "; Students = ";
    $this->get_students_as_string();
    if ($this->town != null) {
      $result .= "; Town = ";
      $result .= $this->town;
    }

    $result .= " }";
    return $result;
  }
}
