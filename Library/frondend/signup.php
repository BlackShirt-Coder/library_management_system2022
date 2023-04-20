<?php
//session_start();
error_reporting(0);
require_once "includes/header.php";
include('includes/config.php');
?>
<section id="" class="d-flex align-items-center">
    <div class="container mt-4">
        <div class="col-md-8 col-sm-6 col-xs-12 mx-auto">
            <div class="card">
                <div class="card-header bg-success text-white">
                    SignUp FORM
                </div>
                <div class="card-body">
                    <form role="form" method="post">
                        <div class="form-group mt-3">
                            <label>Enter UserName</label>
                            <input class="form-control" type="text" name="username" autocomplete="off" required="">
                        </div>
                        <div class="form-group mt-3">
                            <label>Enter Email</label>
                            <input class="form-control" type="email" name="email" autocomplete="off" required="">
                        </div>
                        <div class="form-group mt-3">
                            <label>Enter Phone Number</label>
                            <input class="form-control" type="text" name="phoneNo" autocomplete="off" required="">
                        </div>
                        <div class="form-group mt-3">
                            <label>Enter Roll Number</label>
                            <input class="form-control" type="text" name="rollNumber" autocomplete="off" required="">
                        </div>
                        <div class="form-group mt-3">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" autocomplete="off" required="">
                        </div>
                        <div class="form-group mt-3">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" name="cpassword" autocomplete="off" required="">
                        </div>
                        <div class="form-group my-3">
                            <label>Verification code : </label>
                            <input type="text" name="vercode" maxlength="5" autocomplete="off" required=""
                                   style="width: 150px; height: 25px;">&nbsp;<img src="captcha.php">
                        </div>

                        <button type="submit" name="SignUp" class="btn btn-danger">Register Now</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->


<?php
if (isset($_POST['SignUp'])) {


    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNo = $_POST['phoneNo'];
    $rollNumber = $_POST['rollNumber'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $status = 1;
    if ($password !== $cpassword) {
     $_SESSION['error']="Password Not Mathched";
    } else {
        $sql = "INSERT INTO  students(rollNumber,userName,email,phoneNumber,password,status) VALUES(:rollNumber,:username,:email,:phoneNo,:password,:status)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':rollNumber', $rollNumber, PDO::PARAM_STR);

        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':phoneNo', $phoneNo, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);

        $query->execute();
        $_SESSION['username'] = $username;
        if ($_SESSION['username']) {
            echo "<script>alert('Registered Successfully')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }

    }
} else {
    // echo "<script>alert('Something went wrong. Please try again');</script>";
}


?>



