<?php
include_once '../../../vendor/autoload.php';


$student = new \App\admin\Course\Assign();
$data = $student->set($_POST)->update();


