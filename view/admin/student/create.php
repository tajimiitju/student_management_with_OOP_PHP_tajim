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
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Basic Form Elements
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-2">
                                <form role="form" action="view/admin/student/store.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Student Name</label>
                                        <input name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select name="department" id="" class="form-control">
                                            <option>Select One</option>
                                            <option value="CSE">CSE</option>
                                            <option value="BBA">BBA</option>
                                            <option value="EEE">EEE</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" name="image" class="form-control" />
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