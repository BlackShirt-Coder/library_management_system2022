<?php
require_once "./includes/config.php";
require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $code = mt_rand(100000, 999999);
    $sql = $dbh->prepare("select*from students where email=:email");
    $sql->bindParam(":email", $email);
    $sql->execute();
    $rows = $sql->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows as $res) {
        $rollNumber = $res->rollNumber;
        $sql=$dbh->prepare("update students set code=:code where rollNumber=:rollNumber");
        $sql->bindParam('code',$code);
        $sql->bindParam('rollNumber',$rollNumber);
        $sql->execute();
    }

    $subject = 'Forgot Password Reset Code';
    $message = '<h1>Hi!</h1><br><h3> We received a request to access your <i>UCSTGO Library System Account</i>
' . '<a href="#">' . $email . '</a>' . ' through your email address.</h3><br> <h2>Your Verification Code is Here:</h2><br>' . '<h1>' . $code . '</h1>';


    //Load composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'libraryucstaungoo@gmail.com';
        $mail->Password = 'klbcmlbxjjnljcbd';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        //Send Email
        $mail->setFrom('libraryucstaungoo@gmail.com');

        //Recipients
        $mail->addAddress($email);
        $mail->addReplyTo('libraryucstaungoo@gmail.com');

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();

            $_SESSION['code'] = $code;
            $_SESSION['result'] = 'Your reset code has been sent. Please Check Your Email!';
            $_SESSION['status'] = 'ok';
            if(isset($_SESSION['code'])){
                header("Location:password_reset.php");
            }


    } catch (Exception $e) {
        $_SESSION['result'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        $_SESSION['status'] = 'error';
    }

//    header("location: test.php");

}
?>