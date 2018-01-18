<?php
include_once '../../../vendor/autoload.php';
$student = new \App\admin\Course\Course();
$student = $student->delete($_GET['id']);
