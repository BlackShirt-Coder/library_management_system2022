<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<?php

if(isset($_SESSION['login'])) {
    require_once "header.php";
    require_once "aside.php";
    require_once "navbar.php";
    ?>
    <div class="content-wrapper">
        <section class="content">

            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Request Books</h3>
                                <form method="post" action="export.php">
                                    <button type="submit" id="export_data" name='request_export'
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
                                    <th>Roll Number</th>
                                    <th>Phone Number</th>
                                    <th>Book Title</th>
                                    <th>Request Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $status = 1;
                                $sql = "SELECT * from request_book";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results

                                             as $result) { ?>
                                        <tr>
                                        <td class="center"><?php echo htmlentities($cnt); ?></td>

                                        <td class="center"><?php echo htmlentities($result->rollNumber); ?></td>
                                        <td class="center"><?php echo htmlentities($result->phoneNumber); ?></td>
                                        <td class="center"><?php echo htmlentities($result->BookName); ?></td>
                                        <td class="center"><?php echo htmlentities($result->request_date); ?></td>
                                    <?php }

                                    ?>
                                    </tr>
                                    <?php
                                    $cnt = $cnt + 1;


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
    <?php
}else {
    ?>
    <?php
    header("Location:login.php");
}
?>

