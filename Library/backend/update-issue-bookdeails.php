<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['return'])) {
        $rid = intval($_GET['rid']);
        #################### Before Using Triggers ##############################
//      $bookName= $_POST['returnBookName'];
//      $query=$dbh->prepare("select Stock from books where BookName=:bookName");
//      $query->bindParam('bookName',$bookName);
//      $query->execute();
//      $row=$query->fetchAll(PDO::FETCH_OBJ);
//     foreach ($row as $data){
//         $stock= $data->AvailableBook;
//         $stock=$stock+1;
//         $query=$dbh->prepare("update books set AvailableBook=:stock where BookName=:bookName");
//         $query->bindParam('stock',$stock);
//         $query->bindParam('bookName',$bookName);
//         $query->execute();
//     }
        ###################################################################
           $rstatus = 1;
        $sql = "update borrow set RetrunStatus=:rstatus where BorrowId=:rid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':rid', $rid, PDO::PARAM_STR);
        $query->bindParam(':rstatus', $rstatus, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['msg'] = "Book Returned successfully";
        header('location:manage-issued-books.php');


    }
    ?>
    <?php
}
?>
<?php
require_once "header.php";
require_once "aside.php";
require_once "sidebar.php";
?>

<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Borrowers Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post">
                                <?php
                                $rid = intval($_GET['rid']);
                                $sql = "SELECT students.userName,
books.BookName,books.ISBNNumber,
borrow.IssuesDate,borrow.ReturnDate,
borrow.BorrowId as rid,borrow.RetrunStatus from  borrow 
join students on students.rollNumber=borrow.rollNumber 
join books on books.BookId=borrow.BookId where borrow.BorrowId=:rid";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':rid', $rid, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0)
                                {
                                foreach ($results

                                as $result)
                                { ?>


                                <div class="form-group">
                                    <label>Student Name :</label>
                                    <?php echo htmlentities($result->userName); ?>
                                </div>

                                <div class="form-group">
                                    <label>Book Name :</label>
                                    <?php echo htmlentities($result->BookName); ?>
                                </div>


                                <div class="form-group">
                                    <label>ISBN :</label>
                                    <?php echo htmlentities($result->ISBNNumber); ?>
                                </div>

                                <div class="form-group">
                                    <label>Book Issued Date :</label>
                                    <?php
                                    $IssuesDate = $result->IssuesDate;
                                    echo date('m/d/Y h:i:s a ', strtotime($IssuesDate));
                                    ?>
                                </div>


                                <div class="form-group">
                                    <label>Book Returned Date :</label>
                                    <?php if ($result->ReturnDate == "") {
                                        echo htmlentities("Not Return Yet");
                                    } else {
                                        $ReturnDate = $result->ReturnDate;
                                        echo date('m/d/Y h:i:s a ', strtotime($ReturnDate));
                                    }
                                    ?>
                                </div>


                                <?php if ($result->RetrunStatus == 0){ ?>
                                <input type="hidden" name="returnBookName" value="<?php echo $result->BookName ?>" >
                                <button type="submit" name="return" id="submit" class="btn btn-info text-white">
                                    Return Book
                                </button>

                        </div>

                        <?php }
                        }
                        } ?>
                        </form>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
</div>

<?php
require_once "footer.php";
require_once "copyright.php";

?>

<script src="script.js"></script>
