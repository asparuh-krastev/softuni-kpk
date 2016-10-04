<?php

/**
 * Class LocalCourse
 */
abstract class Course {
  public $name;
  public $teacher_name;
  public $students;

  public function __construct($course_name = '', $teacher_name = '', $students = []) {
    $this->name = $course_name;
    $this->teacher_name = $teacher_name;
    $this->students = $students;
  }

  /**
   * Returns the Course object as a string representation.
   *
   * @return string
   */
  public abstract function to_string();

  /**
   * Returns the students of the current course as a string representation.
   *
   * @return string
   */
  protected function get_students_as_string() {
    if (!$this->students || count($this->students) == 0) {
      return "{ }";
    }	else {
      $students_string = implode(", ", $this->students);
      return "{ {$students_string} }";
    }
  }

  /**
   * Adds passed strundt to the current students collection.
   *
   * @param string $student
   *    Student name as string.
   */
  protected function addStudent($student) {
    $this->students[] = $student;
  }
}