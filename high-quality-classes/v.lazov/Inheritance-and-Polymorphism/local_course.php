<?php

include "course.php";

/**
 * Class LocalCourse
 */
class LocalCourse extends Course{
  /**
   * @var null
   */
	public $lab = null;

	public function __construct($course_name, $teacher_name, $students) {
		parent::__consatruct($course_name, $teacher_name, $students);
		$this->Lab = null;
	}

  /**
   * Returns the LocalCourse object as a string representation.
   *
   * @return string
   */
	public function to_string() {
		$result = '';
		$result .= "LocalCourse { Name = {$this->name}";

		if ($this->teacher_name != null) {
      $result .= "; Teacher = ";
      $result .= $this->teacher_name;
		}

    $result .= "; Students = ";
		$this->get_students_as_string();
		if ($this->lab != null) {
			$result .= "; Lab = ";
			$result .= $this->lab;
		}

		$result .= " }";
		return $result;
	}
}
