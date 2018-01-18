<?php
include_once '../../../vendor/autoload.php';


$student = new \App\admin\Course\Course();
$data = $student->set($_POST)->update();


