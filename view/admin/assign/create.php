<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';

$student = new \App\admin\Student\Student();
$students = $student->index();

$course = new \App\admin\Course\Course();
$courses = $course->index();

?>

    <div id="page-wrapper" style="min-height: 349px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Forms</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div style="position: fixed; right: 35px; z-index: 111">
            <?php
            if(isset($_SESSION['message'])){
                echo "<div class='alert alert-danger'>".$_SESSION['message']."</div>";
                session_unset();
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Form Elements
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-2">
                                <form role="form" action="view/admin/assign/store.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>All Students</label>
                                        <select name="student_id" class="form-control">
                                            <option value="" hidden="hidden">Select One</option>
                                            <?php
                                            foreach ($students as $student){
                                                echo "<option value='".$student['id']."'>".$student['name']."</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label>Course Duration</label>
                                        </div>
                                            <?php
                                            foreach ($courses as $course){
                                            ?>
                                        <label style="margin-right: 12px"><input type="checkbox" name="course_id[]" value="<?= $course['id']?>"> <?= $course['title']?></label>
                                            <?php } ?>
                                    </div>

                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
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