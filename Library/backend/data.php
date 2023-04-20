<?php
require_once "includes/config.php";
header('Content-Type: application/json');
$status=1;
$sql=$dbh->prepare("SELECT * FROM borrow where RetrunStatus=:status");
$sql->bindParam("status",$status);
$sql->execute();
$sql->fetchAll();
$Returnedrows=$sql->rowCount();
echo $Returnedrows;
$status=0;
$sql1=$dbh->prepare("SELECT * FROM borrow where RetrunStatus=:status");
$sql1->bindParam("status",$status);
$sql1->execute();
$sql1->fetchAll();
$notReturnedRows=$sql1->rowCount();
echo $notReturnedRows;