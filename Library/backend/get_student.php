<?php 
require_once("includes/config.php");
if(!empty($_POST["rollNumber"])) {
  $rollNumber= strtoupper($_POST["rollNumber"]);
 
    $sql ="SELECT userName,status FROM students WHERE rollNumber=:rollNumber";
$query= $dbh -> prepare($sql);
$query-> bindParam(':rollNumber', $rollNumber, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $result) {
if($result->status==0)
{
echo "<span style='color:red'> Student ID Blocked </span>"."<br />";
echo "<b>Student Name-</b>" .$result->userName;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php  
echo htmlentities($result->userName);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{
  
  echo "<span style='color:red'> Invaid Student Id. Please Enter Valid Student id .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
