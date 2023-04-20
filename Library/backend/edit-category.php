<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['update'])) {
        $category = $_POST['category'];
        $status = $_POST['status'];
        $catid = intval($_GET['catid']);
        $sql = "update  category set CategoryName=:category,Status=:status where CatId=:catid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':catid', $catid, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['updatemsg'] = "Brand updated successfully";
        header('location:manage-categories.php');

    }
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
                            <h3 class="card-title">Category Infomation</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post">
                                <?php
                                $catid = intval($_GET['catid']);
                                $sql = "SELECT * from category where CatId=:catid";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':catid', $catid, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) {
                                        ?>
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input class="form-control" type="text" name="category"
                                                   value="<?php echo htmlentities($result->CategoryName); ?>" required/>
                                        </div>
                                        <div class="form-group">
                                        <label>Status</label>
                                        <?php if ($result->Status == 1) { ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="1"
                                                           checked="checked">Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="0">Inactive
                                                </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="0"
                                                           checked="checked">Inactive
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="1">Active
                                                </label>
                                            </div
                                        <?php }
                                    } ?>
                                    </div>
                                <?php }
                                ?>
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


