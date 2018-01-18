<?php
include_once '../../../vendor/autoload.php';


//echo rand();

if(isset($_FILES['image'])){
   $imgUpload = new \App\Helper();
   $_POST['image'] = $imgUpload->image_upload();
}
$student = new \App\admin\Student\Student();
$student->set($_POST)->store();
