<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';

$course = new \App\admin\Course\Assign();

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
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Form Elements
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-2">
                                <form role="form" action="view/admin/course/update.php" method="POST">
                                    <div class="form-group">
                                        <label>Course Title</label>
                                        <input name="title" value="<?php echo $course['title']?>" class="form-control">
                                        <input type="hidden" name="id" value="<?php echo $course['id']?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Course Credit</label>
                                        <input name="credit" value="<?php echo $course['credit']?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label>Course Duration</label>
                                        </div>
                                        <label>
                                            <input type="radio" <?= ($course['duration']=='three-month')?'checked':''?> name="duration" value="three-month"> 03 Months
                                        </label>
                                        <label>
                                            <input type="radio" <?= ($course['duration']=='six-month')?'checked':''?> name="duration" value="six-month"> 06 Months
                                        </label>
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