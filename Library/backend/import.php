<?php
require_once "./includes/config.php";
require 'vendor/autoload.php';

//error_reporting(0);

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//category import
if (isset($_POST['save_category'])) {
    $fileName = $_FILES['add_category']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];
    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['add_category']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $row) {
            if ($count > 0) {
                $id = $row['0'];
                $categoryName = $row['1'];
                $status = $row['2'];
                $creationDate = $row['3'];
                $updateDate = $row['4'];

                $sql = $dbh->prepare("insert into category (CatId,CategoryName,Status,CreationDate,UpdationDate) values(:id,:category,:status,:creation,:update)");
                $sql->bindParam(":id", $id);
                $sql->bindParam(":category", $categoryName);
                $sql->bindParam(":status", $status);
                $sql->bindParam(":creation", $creationDate);
                $sql->bindParam(":update", $updateDate);
                $sql->execute();
                $msg = true;
            } else {
                $count = "1";
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: manage-categories.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Imported";
            header('Location: add-category.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: add-category.php');
        exit(0);
    }


}
//end category import
//add author
if (isset($_POST['save_author'])) {
    $fileName = $_FILES['add_author']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];
    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['add_author']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $row) {
            if ($count > 0) {
                $id = $row['0'];
                $authorName = $row['1'];
                $creationDate = $row['2'];
                $updateDate = $row['3'];
                if ($creationDate == " ") {
                    $creationDate = date('Y-m-d');
                } else {

                    $sql = $dbh->prepare("insert into authors (AuthorId,AuthorName,creationDate,UpdationDate) values(:id,:authors,:creation,:update)");
                    $sql->bindParam(":id", $id);
                    $sql->bindParam(":authors", $authorName);
                    $sql->bindParam(":creation", $creationDate);
                    $sql->bindParam(":update", $updateDate);
                    $sql->execute();
                    $msg = true;
                }
            } else {
                $count = "1";
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: manage-authors.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Imported";
            header('Location: add-author.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: add-author.php');
        exit(0);
    }


}

//add Books
if (isset($_POST['save_books'])) {
    $fileName = $_FILES['add_books']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];
    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['add_books']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $row) {
            if ($count > 0) {
                $BookId = $row['0'];
                $bookName = $row['1'];
                $categoryName = $row['2'];
                $authorName = $row['3'];
                $isbn = $row['4'];
                $isbn=mt_rand(1000,9999);
                $totalBook = $row['5'];
                $bookShelf=$row['6'];
                // if new category is import
                if (isset($categoryName)) {
                    $sql = $dbh->prepare("select*from category where categoryName=:categoryName");
                    $sql->bindParam(":categoryName", $categoryName);
                    $sql->execute();
                    $rows = $sql->rowCount();
                    if ($rows > 0) {
                        $sql = $dbh->prepare("select*from category where categoryName=:categoryName");
                        $sql->bindParam(":categoryName", $categoryName);
                        $sql->execute();
                        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $data) {
                            $categoryId = $data['CatId'];
                        }
                    } else {
                        $sql = $dbh->prepare("insert into category (CategoryName) values (:category)");
                        $sql->bindParam(":category", $categoryName);
                        $sql->execute();
                        $sql = $dbh->prepare("select*from category where categoryName=:categoryName");
                        $sql->bindParam(":categoryName", $categoryName);
                        $sql->execute();
                        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $data) {
                            $categoryId = $data['CatId'];
                        }
                    }

                }
                if (isset($authorName)) {
                    $sql = $dbh->prepare("select*from authors where AuthorName=:authorName");
                    $sql->bindParam(":authorName", $authorName);
                    $sql->execute();
                   $rows= $sql->rowCount();
                    if ($rows>0) {
                        $sql = $dbh->prepare("select*from authors where AuthorName=:authorName");
                        $sql->bindParam(":authorName", $authorName);
                        $sql->execute();
                        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $data) {
                            $authorId = $data['AuthorId'];

                        }
                    } else {
                        $sql = $dbh->prepare("insert into authors (AuthorName) values (:author)");
                        $sql->bindParam(":author", $authorName);
                        $sql->execute();
                        $sql = $dbh->prepare("select*from authors where AuthorName=:authorName");
                        $sql->bindParam(":authorName", $authorName);
                        $sql->execute();
                        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $data) {
                            $authorId = $data['AuthorId'];

                        }
                    }
                }

                $sql = $dbh->prepare("insert into books (BookId,BookName,CatId,AuthorId,ISBNNumber,TotalBook,AvailableBook,bookShelf) values(:bid,:bookName,:catId,:authorId,:isbn,:totalBook,:availableBook,:bookShelf)");
                $sql->bindParam(":bid", $BookId);
                $sql->bindParam(":bookName", $bookName);
                $sql->bindParam(":catId", $categoryId);
                $sql->bindParam(":authorId", $authorId);
                $sql->bindParam(":isbn", $isbn);
                $sql->bindParam(":totalBook", $totalBook);
                $sql->bindParam(":availableBook", $totalBook);
                 $sql->bindParam(":bookShelf", $bookShelf);
                $sql->execute();
                $msg = true;
            } else {
                $count = "1";
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: manage-books.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Imported";
            header('Location: add-book.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: add-book.php');
        exit(0);
    }


}
?>