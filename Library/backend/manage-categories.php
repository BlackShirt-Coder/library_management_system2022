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
    $sql = "delete from category  WHERE CatId=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    if( $query->execute()){
   
    }

}


}

    ?>


    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="h3">Manage Category</h3>
                                <form method="post" action="export.php">
                                    <button type="submit" id="export_data" name='category_export'
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
                                    <th>Category</th>
                                    <th>Status</th>
                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sql = "SELECT * from category";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results

                                             as $result) {

                                        ?>
                                        <tr>
                                            <td class="center"><?php echo htmlentities($cnt); ?></td>
                                            <td class="center"><?php echo htmlentities($result->CategoryName); ?></td>
                                            <td class="center"><?php if ($result->Status == 1) { ?>
                                                    <a href="" class="btn btn-success btn-xs">Active</a>
                                                <?php } else { ?>
                                                    <a href="" class="btn btn-danger btn-xs">Inactive</a>
                                                <?php } ?></td>
                                            
                                            <td class="center">

                                                <a href="edit-category.php?catid=<?php echo htmlentities($result->CatId); ?>">
                                                    <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit
                                                    </button>
                                                    <a href="manage-categories.php?del=<?php echo htmlentities($result->CatId); ?>"
                                                       onclick="return confirm('Are you sure you want to delete?');""
                                                    >
                                                    <button class="btn btn-danger"><i class="fa fa-pencil"></i>
                                                        Delete
                                                    </button>
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
        </section>
    </div>

    <?php

require_once "footer.php";
require_once "copyright.php";
?>
<script src="script.js"></script>