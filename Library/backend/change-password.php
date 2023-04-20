<?php
session_start();
error_reporting(0);
include('includes/config.php');
require_once "header.php";
require_once "aside.php";
require_once "navbar.php";
?>
<?php
if(isset($_SESSION['login'])) {

?>
<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mt-3">
                        <div class="card-header text-primary">
                            Change Password
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" onSubmit="return valid();" name="chngpwd">

                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off"
                                           required/>
                                </div>

                                <div class="form-group">
                                    <label>Enter Password</label>
                                    <input class="form-control" type="password" name="newpassword"
                                           autocomplete="off" required/>
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password </label>
                                    <input class="form-control" type="password" name="confirmpassword"
                                           autocomplete="off" required/>
                                </div>

                                <button type="submit" name="change" class="btn btn-info text-white">Change</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<?php
}else{
    echo "<script>window.location='login.php'</script>";
}
 ?>
<?php
if (isset($_POST['change'])) {
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $confirmpassword=md5($confirmpassword);
    $id = 1;
    $sql = "update  admin set Password=:password where adminId=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':password', $confirmpassword, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['updatemsg'] = "Password  updated successfully";
    if(   $_SESSION['updatemsg']){
        echo "<script>alert('Password is Successfully Updated')</script>";
    }

}
require_once "footer.php";
?>
<script src="script.js"></script>