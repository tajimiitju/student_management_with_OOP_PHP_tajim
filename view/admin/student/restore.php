<?php

include_once '../../../vendor/autoload.php';
$student = new \App\admin\Student\Student();
$students = $student->restore($_GET['id']);
