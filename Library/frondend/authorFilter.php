
<div class="row">
    <?php
    require_once "includes/config.php";
    $aid = $_REQUEST["q"];
    $sql = $dbh->prepare("select * from books where AuthorId=$aid");
    $sql->execute();
    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $data) {
        ?>
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="card border-0">
                <p class=""><?php echo $data["BookName"] ?></p>
                <img style="width:200px;" class="my-2"
                     src="../assets/img/<?php echo $data['cover_img'] ?>">
            </div>
        </div>
        <?php

    }
    ?>




