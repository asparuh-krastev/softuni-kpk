<?php

include "local_course.php";
include "offsite_course.php";

$local_course = new LocalCourse("Databases");
echo $local_course->toString();

$local_course->lab = "Enterprise";
echo $local_course->toString();

$local_course->students = ["Peter", "Maria"];
echo $local_course->toString();

$local_course->teacher_name = "Svetlin Nakov";
$local_course->addStudent("Milena");
$local_course->addStudent("Todor");
echo $local_course->toString();

$offsite_course = new OffsiteCourse(
  "PHP and WordPress Development",
  "Mario Peshev",
  [ "Thomas", "Ani", "Steve" ]
);
echo $offsite_course->toString();