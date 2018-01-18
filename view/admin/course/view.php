<?php

include_once '../include/header.php';

include_once '../../../vendor/autoload.php';

$course = new \App\admin\Course\Course();

$course = $course->view($_GET['id']);

?>

    <div id="page-wrapper" style="min-height: 349px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Forms</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <?php
        if(isset($_SESSION['msg'])){ ?>

            <div class="alert alert-success">
                <?php
                echo $_SESSION['msg'];
                session_unset();
                ?>
            </div>

        <?php } ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Form Elements
                    </div>
                    <div class="panel-body">
                        <dl>
                            <dt>Student Name</dt>
                            <dd><?php echo $course['title']?></dd>
                            <dt>Department</dt>
                            <dd><?php echo $course['credit']?></dd>
                            <dt>Address</dt>
                            <dd><?php echo $course['duration']?></dd>
                        </dl>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

<?php
include_once '../include/footer.php';
?>