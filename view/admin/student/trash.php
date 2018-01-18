<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$student = new \App\admin\Student\Student();
$students = $student->trash();

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
        if(isset($_SESSION['msg'])){
            echo "<div class='alert alert-success'>".$_SESSION['msg']."</div>";
            session_unset();
        }
        if(isset($_SESSION['delete'])){
            echo "<div class='alert alert-danger'>".$_SESSION['delete']."</div>";
            session_unset();
        }
        if(isset($_SESSION['update'])){
            echo "<div class='alert alert-info'>".$_SESSION['update']."</div>";
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
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $sl = 1;
                        foreach ($students as $student) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $sl++?></td>
                                <td><?php echo $student['name']?></td>
                                <td><?php echo $student['department']?></td>
                                <td><?php echo $student['address']?></td>
                                <td class="text-center">
                                    <img src="view/admin/student/uploads/<?php echo $student['image']?>" width="100" alt="">
                                </td>
                                <td class="center">
                                    <a class="text-info" href="view/admin/student/restore.php?id=<?php echo $student['unique_id']?>">Restore</a> |
                                    <a data-toggle="modal" data-target="#myModal" data-id="<?php echo $student['unique_id']?>" class="text-danger delete" href="javaScript:void(0)" >Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->


                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="view/admin/student/delete.php" method="get">
                            <input id="delete" type="hidden" name="id">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Are you sure want to Delete ? </h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
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

