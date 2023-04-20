<?php
session_start();
error_reporting(0);

if (isset($_SESSION['login'])) {
    include('includes/config.php');
    require_once "header.php";
    require_once "aside.php";
    require_once "navbar.php";
    ?>
    <style>
    input[type="file"]::file-selector-button {
        border: 2px solid #0f801d;
        padding: 0.2em 0.4em;
        border-radius: 0.2em;
        background-color: green;
        transition: 1s;
        color:white;
    }

    input[type="file"]::file-selector-button:hover {
        background-color: #0f801d;
        border: 2px solid #0f801d;
    }
</style>
<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="h3">Add Books</h3>
                                <form action="import.php" enctype="multipart/form-data" method="post">
                                    <input type="submit" name="save_books" value="Import" style="display:none"
                                           id="submit">
                                    <input type="file" name="add_books" id="import"
                                           onchange="document.getElementById('submit').click()"/>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post">
                                <div class="form-group">

                                    <input class="form-control" type="text" name="bookname" autocomplete="off"
                                           required/>
                                </div>

                                <div class="form-group">
                                    <label> Category<span style="color:red;">*</span></label>
                                    <select class="form-control" name="category" required="required">
                                        <option value=""> Select Category</option>
                                        <?php
                                        $status = 1;
                                        $sql = "SELECT * from  category where Status=:status";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':status', $status, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) { ?>
                                                <option value="<?php echo htmlentities($result->CatId); ?>"><?php echo htmlentities($result->CategoryName); ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label> Author<span style="color:red;">*</span></label>
                                    <select class="form-control" name="author" required="required">
                                        <option value=""> Select Author</option>
                                        <?php

                                        $sql = "SELECT * from  authors ";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) { ?>
                                                <option value="<?php echo htmlentities($result->AuthorId); ?>"><?php echo htmlentities($result->AuthorName); ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Cover Image<span style="color:red;">*</span></label>
                                    <div style="display: flex;">
                                        <img style="height:100px;width:auto;" name="cover_img"
                                             src="../assets/img/<?php echo htmlentities($result->cover_img); ?>">
                                        <input type="file" style="margin-left: 10px;" name="cover_img">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>ISBN Number<span style="color:red;">*</span></label>
                                    <input class="form-control" type="text" disabled name="isbn" autocomplete="off"/>
                                    <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be
                                        unique</p>
                                </div>

                                <div class="form-group">
                                    <label>Available Book<span style="color:red;">*</span></label>
                                    <input class="form-control" type="number" name="stock" autocomplete="off" min="1"
                                           value="1" required="required"/>
                                </div>
                                 <div class="form-group">
                                    <label>Book Shelf<span style="color:red;">*</span></label>
                                    <input class="form-control" type="number" name="shelf" autocomplete="off" min="1" max="6"
                                           value="1" required="required"/>
                                </div>
                                <button type="submit" name="add" class="btn btn-info text-white">Add</button>

                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
<?php
    if (isset($_POST['add'])) {
        $bookname = $_POST['bookname'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $cover_img = $_POST['cover_img'];
        $shelf=$_POST['shelf'];
        $isbn = mt_rand(1000, 9999);

        $stock = $_POST['stock'];
        $sql = "INSERT INTO  books(BookName,CatId,AuthorId,ISBNNumber,TotalBook,AvailableBook,cover_img,bookShelf) VALUES(:bookname,:category,:author,:isbn,:stock,:stock,:cover_img,:shelf)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':bookname', $bookname, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':author', $author, PDO::PARAM_STR);
        $query->bindParam(':isbn', $isbn, PDO::PARAM_STR);
        $query->bindParam(':stock', $stock, PDO::PARAM_STR);
        $query->bindParam(':stock', $stock, PDO::PARAM_STR);
        $query->bindParam(':cover_img', $cover_img, PDO::PARAM_STR);
        $query->bindParam(':shelf', $shelf, PDO::PARAM_STR);
        $query->execute();
    }
    require_once "footer.php";
    }
else {
    header('location:login.php');
}
?>


<script src="script.js"></script>