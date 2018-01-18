<?php

include_once '../../../vendor/autoload.php';

$student = new \App\admin\Student\Student();
$delete = new \App\Helper();


$delete->img_delete($_GET['id']);
$student = $student->delete($_GET['id']);
