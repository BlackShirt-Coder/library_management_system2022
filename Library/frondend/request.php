<?php
require_once "includes/config.php";
if(isset($_POST['request'])){
    $rollNumber=$_POST['rollNumber'];
    $phoneNumber=$_POST['phoneNumber'];
    $bookName=$_POST['bookName'];
    $sql=$dbh->prepare("insert into request_book (rollNumber,phoneNumber,BookName)values(:rno,:pno,:bn)");
    $sql->bindParam("rno",$rollNumber);
    $sql->bindParam("pno",$phoneNumber);
    $sql->bindParam("bn",$bookName);
    $sql->execute();
    header("Location:home.php");
}

?>