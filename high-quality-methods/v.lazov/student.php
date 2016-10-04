<?php

/**
 * Class Student
 */
class Student {
  public $first_name;
  public $last_name;
  public $other_info;
  public $birth_date;

  public function __construct($first_name, $last_name) {
    $this->first_name = $first_name;
    $this->last_name = $last_name;
  }

  /**
   * Checks if the current student is older than the passed one.
   *
   * @param Object $student
   *
   * @return bool
   *    TRUE if the current user is older, FALSE otherwise.
   */
  public function is_older_than($student) {
    if (strtotime($this->birth_date) > strtotime($student->birth_date))
      return TRUE;

    return FALSE;
  }
}
