<?php
require_once "config.php";
if (isset($_POST['query'])) {
    $sql = $dbh->prepare("SELECT * from books WHERE  BookName like :search");
    $how=$_POST['query'];
    $sql->bindValue(':search', '%' .$how. '%');
    $sql->execute();
    if ($sql->rowCount() > 0) {
        while ($row = $sql->fetch()) {
            $bookName = $row["BookName"];
            echo "<div class='px-3 py-2 data'><a>$bookName</a></div>";
        }
    }

     else {
        echo "
<div class='text-danger p-5 text-center' role='alert'>
    Book not found
</div>
";
    }
}