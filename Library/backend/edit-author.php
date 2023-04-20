<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{
    header('location:index.php');
}
else {

    if (isset($_POST['update'])) {
        $athrid = intval($_GET['athrid']);
        $author = $_POST['author'];
        $sql = "update  authors set AuthorName=:author where AuthorId=:athrid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':author', $author, PDO::PARAM_STR);
        $query->bindParam(':athrid', $athrid, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['updatemsg'] = "Author info updated successfully";
        header('location:manage-authors.php');


    }
}
?>

<?php
require_once "header.php";
require_once "aside.php";
require_once "navbar.php";
?>

<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Authors Infomation</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <?php
                                    $athrid = intval($_GET['athrid']);
                                    $sql = "SELECT * from  authors where AuthorId=:athrid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':athrid', $athrid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) { ?>
                                            <input class="form-control" type="text" name="author"
                                                   value="<?php echo htmlentities($result->AuthorName); ?>" required/>
                                        <?php }
                                    } ?>
                                </div>

                                <button type="submit" name="update" class="btn btn-info text-white">Update</button>

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
?>
<script src="script.js"></script>