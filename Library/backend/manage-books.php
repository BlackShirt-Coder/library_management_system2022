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
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "delete from books  WHERE BookId=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['delmsg'] = "Category deleted scuccessfully ";
        header('location:manage-books.php');

    }

}


?>


<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="card mt-2">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">

                            <h3 class="card-title">Manage Books</h3>
                            <form method="post" action="export.php">
                                <button type="submit" id="export_data" name='books_export'
                                        value="Export to excel" class="btn btn-info">Export to excel
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped"
                               style="font-size:14px!important;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Book Name</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Total</th>
                                <th>Available</th>
                                <th>Cover</th>
                                <th>Shelf</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $sql = "SELECT books.BookName,category.CategoryName,authors.AuthorName,books.ISBNNumber,books.TotalBook,books.AvailableBook,books.cover_img,books.bookShelf,books.BookId from  books
                             join category on category.CatId=books.CatId 
                             join authors on authors.AuthorId=books.AuthorId";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) { ?>
                                    <tr>
                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                        <td class="center"><?php echo htmlentities($result->BookName); ?></td>
                                        <td class="center"><?php echo htmlentities($result->CategoryName); ?></td>
                                        <td class="center"><?php echo htmlentities($result->AuthorName); ?></td>
                                        <td class="center"><?php echo htmlentities($result->ISBNNumber); ?></td>
                                        <td class="center"><?php echo htmlentities($result->TotalBook); ?></td>
                                        <td class="center"><?php echo htmlentities($result->AvailableBook); ?></td>
                                        <td class="center"><img style="height:50px;"
                                                                src="../assets/img/<?php echo htmlentities($result->cover_img); ?>">
                                        </td>
                                        <td class="center"><?php echo htmlentities($result->bookShelf); ?></td>

                                        <td class="center">

                                            <a href="edit-book.php?bookid=<?php echo htmlentities($result->BookId); ?>">
                                                <button class="btn btn-primary"><i class="fa fa-edit "></i> 
                                                </button>
                                                <a href="manage-books.php?del=<?php echo htmlentities($result->BookId); ?>"
                                                   onclick="return confirm('Are you sure you want to delete?');"" >
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i>
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
        <!-- /.container-fluid -->
    </section>
</div>

<?php
require_once "footer.php";
require_once "copyright.php";
?>
<script src="script.js"></script>
