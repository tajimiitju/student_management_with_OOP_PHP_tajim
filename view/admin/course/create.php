<?php
include_once '../include/header.php';

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
                                <form role="form" action="view/admin/course/store.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Course Title</label>
                                        <input name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Course Credit</label>
                                        <input name="credit" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label>Course Duration</label>
                                        </div>
                                        <label>
                                            <input type="radio" name="duration" value="three-month"> 03 Months
                                        </label>
                                        <label>
                                            <input type="radio" name="duration" value="six-month"> 06 Months
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