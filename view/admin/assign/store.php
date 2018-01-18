<?php
include_once '../../../vendor/autoload.php';
$assign = new \App\admin\Assign\Assign();
$assign->set($_POST);
$assign->store();
