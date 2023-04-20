<?php
ob_start();
$name = $_GET['q'];
if (!(isset($name))) {
    header("Location:index.php");
    ob_end_flush();
}
?>
<?php
require_once "./includes/config.php";
require_once "./includes/header.php";
?>


<?php
if (isset($name)) {
    require_once "includes/config.php";
    $sql = $dbh->prepare("select * from books where BookName=:bookName");
    $sql->bindParam("bookName", $name);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $data) {
            $BookName = $data['BookName'];
            $cover_img = $data['cover_img'];
            $isbn = $data['ISBNNumber'];
            $available = $data['AvailableBook'];
            $bookShelf = $data['bookShelf'];
            ?>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="card border-0">
                    <p class=""><?php echo $data["BookName"] ?></p>
                    <img style="width:200px;"
                         src="../assets/img/<?php echo $data['cover_img'] ?>">
<br>
                    <p class="">ISBN Number- <?php echo $isbn ?></p>
                    <p class="">BookShelf- <?php echo $bookShelf ?></p>
                    <p class="">Available- <?php echo $available ?></p>

                </div>
            </div>
            <?php
        }
    }
    else{
        echo "Book Not Found";
    }
}
?>




