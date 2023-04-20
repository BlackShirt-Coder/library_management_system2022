<?php
session_start();
error_reporting(0);
require_once "includes/header.php";
include('includes/config.php');
?>
<style>
    body{
        background-color: #869f77;
    }
</style>
<section id="" class="d-flex align-items-center">
    <div class="container mt-4">
        <div class="col-md-6 col-sm-6 col-xs-12 mx-auto">
            <div class="card">
                <div class="card-header bg-info">
                    LOGIN FORM
                </div>
                <div class="card-body">
                    <form role="form" method="post">

                        <div class="form-group mt-3">
                            <label>Enter Email</label>
                            <input class="form-control" type="email" name="email" autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" autocomplete="off" required="">
                            <p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
                        </div>
                        <div class="form-group my-5">
                            <label>Verification code : </label>
                            <input type="text" name="vercode" maxlength="5" autocomplete="off" required="" style="width: 150px; height: 25px;">&nbsp;<img src="captcha.php">
                        </div>

                        <button type="submit" name="login" class="btn btn-info">LOGIN </button>
                        <a href="signup.php">| Not Registered Yet</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->


<?php

if (isset($_POST['login'])) {
    //code for captach verification
    if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"] == '') {
        echo "<script>alert('Incorrect verification code');</script>";
    } else {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = "SELECT rollNumber,username,email,password,status FROM students WHERE email=:email and password=:password";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                $_SESSION['username'] = $result->username;
                $_SESSION['StudentId'] = $result->rollNumber;
                if ($result->status == 1) {
                    $_SESSION['login'] = $_POST['email'];
                    echo "<script type='text/javascript'> document.location ='../frondend/home.php'; </script>";
                } else {
                    echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

                }
            }

        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    }
}
?>




