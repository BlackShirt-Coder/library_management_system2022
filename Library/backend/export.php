<?php
require_once "./includes/config.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if (isset($_POST['category_export'])) {
    $file_ext_name = "xlsx";
    $fileName = "library-sheet" . "-" . date("Ymd");
    $query = $dbh->prepare("SELECT * FROM category");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'CategoryName');
        $sheet->setCellValue('C1', 'Status');
        $sheet->setCellValue('D1', 'Creation Date');
        $sheet->setCellValue('E1', 'Update Date');

        $rowCount = 2;
        foreach ($rows as $data) {
            $sheet->setCellValue('A' . $rowCount, $data['id']);
            $sheet->setCellValue('B' . $rowCount, $data['CategoryName']);
            $sheet->setCellValue('C' . $rowCount, $data['Status']);
            $sheet->setCellValue('D' . $rowCount, $data['CreationDate']);
            $sheet->setCellValue('E' . $rowCount, $data['UpdationDate']);
            $rowCount++;
        }

        if ($file_ext_name == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
            $final_filename = $fileName . '.xlsx';
        }

        $writer->save($final_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="' . urlencode($final_filename) . '"');
        $writer->save('php://output');

    } else {
        $_SESSION['message'] = "No Record Found";
        header('Location: add-category.php');
        exit(0);

    }

}
if (isset($_POST['student_export'])) {
    $file_ext_name = "xlsx";
    $fileName = "library-sheet" . "-" . date('Ymd');
    $query = $dbh->prepare("SELECT * FROM students");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       
        $sheet->setCellValue('A1', 'Student Name');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Mobile Number');
        $sheet->setCellValue('D1', 'Roll Number');
        $sheet->setCellValue('E1', 'Reg Date');
        $sheet->setCellValue('F1', 'Status');

        $rowCount = 2;
        foreach ($rows as $data) {
        
            $sheet->setCellValue('A' . $rowCount, $data['userName']);
            $sheet->setCellValue('B' . $rowCount, $data['email']);
            $sheet->setCellValue('C' . $rowCount, $data['phoneNumber']);
            $sheet->setCellValue('D' . $rowCount, $data['rollNumber']);
            $sheet->setCellValue('E' . $rowCount, $data['status']);
            $sheet->setCellValue('F' . $rowCount, $data['RegDate']);
            $rowCount++;
        }

        if ($file_ext_name == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
            $final_filename = $fileName . '.xlsx';
        }

        $writer->save($final_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="' . urlencode($final_filename) . '"');
        $writer->save('php://output');

    } else {
        $_SESSION['message'] = "No Record Found";
        header('Location: index.php');
        exit(0);

    }

}
if (isset($_POST['author_export'])) {
    $file_ext_name = "xlsx";
    $fileName = "library-sheet" . "-" . date('Ymd');
    $query = $dbh->prepare("SELECT * FROM authors");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Author Name');
        $sheet->setCellValue('C1', 'Creation Date');
        $sheet->setCellValue('D1', 'Updation Date');

        $rowCount = 2;
        foreach ($rows as $data) {
            $sheet->setCellValue('A' . $rowCount, $data['id']);
            $sheet->setCellValue('B' . $rowCount, $data['AuthorName']);
            $sheet->setCellValue('C' . $rowCount, $data['creationDate']);
            $sheet->setCellValue('D' . $rowCount, $data['UpdationDate']);
            $rowCount++;
        }

        if ($file_ext_name == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
            $final_filename = $fileName . '.xlsx';
        }

        $writer->save($final_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="' . urlencode($final_filename) . '"');
        $writer->save('php://output');

    } else {
        $_SESSION['message'] = "No Record Found";
        header('Location: index.php');
        exit(0);

    }

}
if (isset($_POST['request_export'])) {
    $file_ext_name = "xlsx";
    $fileName = "library-sheet" . "-" . date('Ymd');
    $query = $dbh->prepare("SELECT * FROM request_book");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Roll Number');
        $sheet->setCellValue('C1', 'Phone Number');
        $sheet->setCellValue('D1', 'Book Name');
        $sheet->setCellValue('E1', 'Request Date');

        $rowCount = 2;
        foreach ($rows as $data) {
            $sheet->setCellValue('A' . $rowCount, $data['id']);
            $sheet->setCellValue('B' . $rowCount, $data['roll_number']);
            $sheet->setCellValue('C' . $rowCount, $data['phone_number']);
            $sheet->setCellValue('D' . $rowCount, $data['book_name']);
            $sheet->setCellValue('E' . $rowCount, $data['request_date']);
            $rowCount++;
        }

        if ($file_ext_name == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
            $final_filename = $fileName . '.xlsx';
        }

        $writer->save($final_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="' . urlencode($final_filename) . '"');
        $writer->save('php://output');

    } else {
        $_SESSION['message'] = "No Record Found";
        header('Location: index.php');
        exit(0);

    }

}
if (isset($_POST['books_export'])) {
    $file_ext_name = "xlsx";
    $fileName = "library-sheet" . "-" . date('Ymd');
    $query = $dbh->prepare("SELECT * FROM books");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Book Name');
        $sheet->setCellValue('C1', 'Category');
        $sheet->setCellValue('D1', 'Author');
        $sheet->setCellValue('E1', 'ISBN');
        $sheet->setCellValue('F1', 'Total');
        $sheet->setCellValue('G1', 'Available');

        $rowCount = 2;
        foreach ($rows as $data) {
            $catId = $data['CatId'];
            $authorId=$data['AuthorId'];

            $sheet->setCellValue('A' . $rowCount, $data['BookId']);
            $sheet->setCellValue('B' . $rowCount, $data['BookName']);
            $query = $dbh->prepare("SELECT * FROM category where CatId=:catId");
            $query->bindParam(":catId", $catId);
            $query->execute();
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $result) {
                $categoryName=$result['CategoryName'];
                $sheet->setCellValue('C' . $rowCount, $categoryName);

            }
            $query = $dbh->prepare("SELECT * FROM authors where AuthorId=:authorId");
            $query->bindParam(":authorId", $authorId);
            $query->execute();
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $authors) {
                $authorName=$authors['AuthorName'];
                $sheet->setCellValue('D' . $rowCount, $authorName);
            }
            $sheet->setCellValue('E' . $rowCount,$data['ISBNNumber'] );
            $sheet->setCellValue('F' . $rowCount,$data['TotalBook'] );
            $sheet->setCellValue('G' . $rowCount,$data['AvailableBook'] );
            $rowCount++;
        }

        if ($file_ext_name == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
            $final_filename = $fileName . '.xlsx';
        }

        $writer->save($final_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="' . urlencode($final_filename) . '"');
        $writer->save('php://output');

    } else {
        $_SESSION['message'] = "No Record Found";
        header('Location: index.php');
        exit(0);

    }

}


?>