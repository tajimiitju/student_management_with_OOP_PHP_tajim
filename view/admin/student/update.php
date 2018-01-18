<?php
include_once '../../../vendor/autoload.php';


if((!empty($_FILES['image']['name']))){
    $helper = new \App\Helper();
    $_POST['image'] = $helper->image_upload();
    $helper->img_delete($_POST['id']);
}

$student = new \App\admin\Student\Student();

$student->set($_POST)->update();
