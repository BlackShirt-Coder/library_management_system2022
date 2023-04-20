<?php
session_start();
require_once "header.php";
require_once "aside.php";
require_once "navbar.php";
//error_reporting(0);
include('includes/config.php');

if ($_SESSION['login']=="") {
    header('location:index.php');
} else {


    ?>

    <div class="content-wrapper">
        <section class="content">

            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Manage Issued Books</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>BookName</th>
                                    <th>ISBN</th>
                                    <th>Issued Date</th>
                                    <th>Returned Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sql = "SELECT students.userName,
books.BookName,books.ISBNNumber,
borrow.IssuesDate,borrow.ReturnDate,borrow.BorrowId as rid from  borrow 
join students on students.rollNumber=borrow.rollNumber join 
books on books.BookId=borrow.BookId order by borrow.BorrowId desc";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) { ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt); ?></td>
                                            <td class="center"><?php echo htmlentities($result->userName); ?></td>
                                            <td class="center"><?php echo htmlentities($result->BookName); ?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBNNumber); ?></td>
                                            <td class="center"><?php $IssuesDate = $result->IssuesDate;
                                                echo date('m/d/Y h:i:s a ', strtotime($IssuesDate)); ?></td>
                                            <td class="center"><?php if ($result->ReturnDate == "") {
                                                    echo htmlentities("Not Return Yet");
                                                } else {
                                                    $ReturnDate = $result->ReturnDate;
                                                    echo date('m/d/Y h:i:s a ', strtotime($ReturnDate));
                                                }
                                                ?></td>
                                            <td class="center">

                                                <a href="update-issue-bookdeails.php?rid=<?php echo htmlentities($result->rid); ?>">
                                                    <button class="btn btn-primary"><i class="fa fa-edit "></i>
                                                        Edit
                                                    </button>

                                            </td>
                                        </tr>
                                        <?php $cnt = $cnt + 1;
                                    }
                                } ?>
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
}
require_once "footer.php";
require_once "copyright.php";
?>
<script src="script.js"></script>
