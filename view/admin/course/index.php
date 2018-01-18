<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
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
                                    <th>Course Title</th>
                                    <th>Course Credit</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                            $sl = 1;
                            foreach ($courses as $course) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $sl++?></td>
                                    <td><?php echo $course['title']?></td>
                                    <td><?php echo $course['credit']?></td>
                                    <td><?php echo $course['duration']?></td>
                                    <td class="center">
                                        <a href="view/admin/course/view.php?id=<?php echo $course['id']?>">View</a>
                                        <a href="view/admin/course/edit.php?id=<?php echo $course['id']?>">Edit</a>
                                        <a class="text-danger" href="view/admin/course/delete.php?id=<?php echo $course['id']?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                                ?>
                            </tbody>

                        </table>
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