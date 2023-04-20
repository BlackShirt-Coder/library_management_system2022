<?php
session_start();
//  error_reporting(0);
include('includes/config.php');
require_once "header.php";
require_once "aside.php";
require_once "navbar.php";
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $bookname = $_POST['bookname'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        $shelf = $_POST['shelf'];
        $img = $_FILES['cover_img']['name'];
    
        $TotalBook = $_POST['TotalBook'];
        $bookid = intval($_GET['bookid']);
        $sql = "update  books set BookName=:bookname,CatId=:category,AuthorId=:author,ISBNNumber=:isbn,cover_img=:cover_img,TotalBook=:total,bookShelf=:shelf where BookId=:bookid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':bookname', $bookname, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':author', $author, PDO::PARAM_STR);
        $query->bindParam(':isbn', $isbn, PDO::PARAM_STR);
        $query->bindParam(':shelf', $shelf, PDO::PARAM_STR);
        $query->bindParam(':cover_img', $img, PDO::PARAM_STR);
        $query->bindParam(':total', $TotalBook, PDO::PARAM_STR);
        $query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['msg'] = "Book info updated successfully";
        if(isset($_SESSION['msg'])){
         ?>
           <script>alert("Updated Successfully")</script>
           <script>window.location='manage-books.php'</script>
 <?php 
     }


    }

}
?>


<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Books Infomation</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <?php
                                $bookid = intval($_GET['bookid']);
                                $sql = "SELECT books.BookName,category.CategoryName,category.CatId as cid,authors.AuthorName,books.cover_img,authors.AuthorId as athrid,books.ISBNNumber,books.TotalBook,books.bookShelf,books.BookId as bookid from  books
                                 join category on category.CatId=books.CatId 
                                 join authors on authors.AuthorId=books.AuthorId 
                                 where books.BookId=:bookid";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) { ?>

                                        <div class="form-group">
                                            <label>Book Name<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="bookname"
                                                   value="<?php echo htmlentities($result->BookName); ?>" required/>
                                        </div>

                                        <div class="form-group">
                                            <label> Category<span style="color:red;">*</span></label>
                                            <select class="form-control" name="category" required="required">
                                                <option value="<?php echo htmlentities($result->cid); ?>"> <?php echo htmlentities($catname = $result->CategoryName); ?></option>
                                                <?php
                                                $status = 1;
                                                $sql1 = "SELECT * from  category where Status=:status";
                                                $query1 = $dbh->prepare($sql1);
                                                $query1->bindParam(':status', $status, PDO::PARAM_STR);
                                                $query1->execute();
                                                $resultss = $query1->fetchAll(PDO::FETCH_OBJ);
                                                if ($query1->rowCount() > 0) {
                                                    foreach ($resultss as $row) {
                                                        if ($catname == $row->CategoryName) {
                                                            continue;
                                                        } else {
                                                            ?>
                                                            <option value="<?php echo htmlentities($row->CatId); ?>"><?php echo htmlentities($row->CategoryName); ?></option>
                                                        <?php }
                                                    }
                                                } ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Author<span style="color:red;">*</span></label>
                                            <select class="form-control" name="author" required="required">
                                                <option value="<?php echo htmlentities($result->athrid); ?>"> <?php echo htmlentities($athrname = $result->AuthorName); ?></option>
                                                <?php

                                                $sql2 = "SELECT * from  authors ";
                                                $query2 = $dbh->prepare($sql2);
                                                $query2->execute();
                                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                                if ($query2->rowCount() > 0) {
                                                    foreach ($result2 as $ret) {
                                                        if ($athrname == $ret->AuthorName) {
                                                            continue;
                                                        } else {

                                                            ?>
                                                            <option value="<?php echo htmlentities($ret->id); ?>"><?php echo htmlentities($ret->AuthorName); ?></option>
                                                        <?php }
                                                    }
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>ISBN Number<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="isbn"
                                                   value="<?php echo htmlentities($result->ISBNNumber); ?>"
                                                   required="required"/>
                                            <p class="help-block">An ISBN is an International Standard Book Number.ISBN
                                                Must be
                                                unique</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Book Shelf <span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="shelf"
                                                   value="<?php echo htmlentities($result->bookShelf); ?>"
                                                   required="required"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Cover Image<span style="color:red;">*</span></label>
                                            <div style="display: flex;">
                                                <img style="height:100px;width:auto;" name="cover_img"
                                                     src="../assets/img/<?php echo htmlentities($result->cover_img); ?> ">
                                                <input type="file" style="margin-left: 10px;" name="cover_img">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Book<span style="color:red;">*</span></label>
                                            <input class="form-control" type="number" name="TotalBook" min="1"
                                                   value="<?php echo htmlentities($result->TotalBook); ?>"
                                                   required="required"/>
                                        </div>
                                    <?php }
                                } ?>
                                <button type="submit" name="update" class="btn btn-info">Update</button>

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



<script>
    $(document).ready(function () {
        $(".btn-close").click(function () {
            $(".alert").fadeOut();
        });

    });
</script>