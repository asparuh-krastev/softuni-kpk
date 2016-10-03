<?php

class Student {
	public $first_name;
	public $last_name;
	public $other_info;
	public $birth_date;
	
	public __constuct($first_name, $last_name) {
		$this->firs_name = $first_name;
		$this->last_name = $last_name;
	}

	public is_older_than($student) {			
		if(strtotime($this->birth_date) > strtotime($student->birth_date))
			return TRUE;
		
		return FALSE;
	}
}
