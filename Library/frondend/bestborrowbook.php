<h2 style="font-family: cursive" class="mb-3">The Most Borrow Books</h2>
<div class="row">
    <?php
    require_once "includes/config.php";
    $sql = $dbh->prepare("select * from borrow group by(BookId) having count(BookId)>2");

    $sql->execute();
    if ($sql->rowCount() > 0) {
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $data) {
            $id = $data["BookId"];
            $sql = $dbh->prepare("select * from books where BookId=:bookId");
            $sql->bindParam(":bookId", $id);
            $sql->execute();
            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                ?>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="card border-0">
                        <p class=""><?php echo $row["BookName"] ?></p>
                        <img style="width:200px;" class="my-2"
                             src="../assets/img/<?php echo $row['cover_img'] ?>">
                    </div>
                </div>
                <?php

            }
            ?>
            <?php
        }


    } else {
        ?>
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="card border-0">
                <p class=""><?php echo "Book Not Found" ?></p>
            </div>
        </div>
        <?php
    }
    ?>




