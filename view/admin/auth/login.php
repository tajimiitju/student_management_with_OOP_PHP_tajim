<?php
session_start();
include '../../../vendor/autoload.php';

if(isset($_POST['submit'])){
    $auth = new \App\admin\Auth\Auth();
    $auth->set($_POST)->login();

}

/*
 *
 * $users = $auth->login();
      foreach ($users as $user){
          if($_POST['user'] == $user['user'] && $_POST['password'] == $user['password'] ){
              $_SESSION['user'] = '';
              header('location: ../../../index.php');
          }
      }
 *
 *
 *
if(isset($_POST['submit'])){

    if($_POST['user'] == 'admin' && $_POST['password'] == '123'){
        $_SESSION['user'] = '';
        header('location: ../../../index.php');
    }
}*/


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<base href="http://localhost/P9/PHP63/Day_27_soft_delete_login/"/>

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                        <p>
                            <?php
                            if(isset($_SESSION['msg'])){
                                echo "<div class='alert alert-success'>".$_SESSION['msg']."</div>";
                                session_unset();
                            }
                            ?>
                        </p>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                <a href="view/admin/auth/registration.php">Not registered ?</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php
    include_once '../include/footer.php';


?>