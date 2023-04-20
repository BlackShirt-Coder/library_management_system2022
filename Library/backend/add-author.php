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
            color: white;
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
                                    <h3 class="card-title">Add Authors</h3>
                                    <form action="import.php" enctype="multipart/form-data" method="post">
                                        <input type="submit" name="save_author" value="Import" style="display:none"
                                               id="submit">
                                        <input type="file" name="add_author" id="import"
                                               onchange="document.getElementById('submit').click()"/>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="author" autocomplete="off"
                                               required/>
                                    </div>

                                    <button type="submit" name="create" class="btn btn-info text-white">Add</button>

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
    <script src="script.js"></script>

    <?php
    if (isset($_POST['create'])) {
        $author = $_POST['author'];
        $sql = "INSERT INTO  authors(AuthorName) VALUES(:author)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':author', $author, PDO::PARAM_STR);
        $query->execute();


    }
    require_once "footer.php";
}



else {
    ?>
    <?php
    header("Location:login.php");
}
    ?>
