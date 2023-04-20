<?php
session_start();
error_reporting(0);
include('includes/config.php');
require_once "header.php";
require_once "aside.php";
require_once "navbar.php";
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

// code for block student
    if (isset($_GET['bid'])) {
        $id = $_GET['bid'];
        $status = 0;
        $sql = "update students set status=:status  WHERE rollNumber=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        header('location:reg-students.php');
    }


//code for active students
    if (isset($_GET['aid'])) {
        $id = $_GET['aid'];
        $status = 1;
        $sql = "update students set status=:status  WHERE rollNumber=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        header('location:reg-students.php');
    }
}

?>

<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="card mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Register Students</h3>
                            <form method="post" action="export.php">
                                <button type="submit" id="export_data" name='student_export'
                                        value="Export to excel" class="btn btn-info">Export to excel
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Roll Number</th>
                                <th>Reg Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $status=1;
                            $sql = "SELECT * from students";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results

                                         as $result) { ?>
                                    <tr>
                                        <td class="center"><?php echo htmlentities($cnt); ?></td>

                                        <td class="center"><?php echo htmlentities($result->userName); ?></td>
                                        <td class="center"><?php echo htmlentities($result->email); ?></td>
                                        <td class="center"><?php echo htmlentities($result->phoneNumber); ?></td>
                                        <td class="center"><?php echo htmlentities($result->rollNumber); ?></td>
                                        <td class="center"><?php echo htmlentities($result->RegDate); ?></td>
                                        <td class="center"><?php if ($result->status == 1) {
                                                echo htmlentities("Active");
                                            } else {

                                                echo htmlentities("Blocked");
                                            }
                                            ?></td>
                                        <td class="center">
                                            <?php if ($result->status == 1) {
                                                ?>
                                                <a href="reg-students.php?bid=<?php echo htmlentities($result->rollNumber); ?>"
                                                   onclick="return confirm('Are you sure you want to block this student?');"" >
                                                <button class="btn btn-danger"> Inactive</button>
                                            <?php } else { ?>

                                                <a href="reg-students.php?aid=<?php echo htmlentities($result->rollNumber); ?>"
                                                   onclick="return confirm('Are you sure you want to active this student?');"">
                                                <button class="btn btn-primary"> Active</button>
                                            <?php }

                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                                    $cnt = $cnt + 1;

                                }

                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
</div>
<?php
require_once "footer.php";
require_once "copyright.php";
?>
<script src="script.js"></script>