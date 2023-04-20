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
                            <h3 class="h3">Add Category</h3>
                            <form action="import.php" enctype="multipart/form-data" method="post">
                                <input type="submit" name="save_category" value="Import" style="display:none" id="submit" >
                                <input type="file" name="add_category" id="import"  onchange="document.getElementById('submit').click()" />
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-5">

                        <form role="form" method="post">
                            <div class="form-group">

                                <input class="form-control" type="text" name="category" autocomplete="off"
                                       required/>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio mt-2">
                                    <label>
                                        <input type="radio" name="status" id="status" value="1" checked="checked">Active
                                    </label>
                                </div>
                                <div class="radio ">
                                    <label>
                                        <input type="radio" name="status" id="status" value="0">Inactive
                                    </label>
                                </div>
                                <button type="submit" name="create" class="btn btn-info text-white mt-2">Create
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>


    </div>
</section>
</div>
<?php
    if (isset($_POST['create'])) {
        $category = $_POST['category'];
        $status = $_POST['status'];
        $sql = "INSERT INTO  category(CategoryName,Status) VALUES(:category,:status)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();


    }
    require_once "footer.php";
} else {
    header('location:login.php');

}
?>

<script src="script.js"></script>