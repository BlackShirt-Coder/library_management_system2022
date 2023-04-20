<?php
session_start();
//error_reporting(0);
require_once "header.php";
include('includes/config.php');
 if(isset( $_SESSION['result'])){
    ?>
     <div>
        
         <?php echo $_SESSION['result']; ?>
         <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>


         <section id="" class="d-flex align-items-center">
             <div class="container mt-4">
                 <div class="col-md-6 col-sm-6 col-xs-12 mx-auto">
                     <div class="card">
                         <div class="card-header bg-info">
                             Password Reset
                         </div>
                         <div class="card-body">
                             <form role="form" method="post">
                                 <div class="form-group my-3">
                                     <label>Enter Code</label>
                                     <input class="form-control" type="password" name="code" autocomplete="off" required="">
                                 </div>

                                 <div class="form-group my-3">
                                     <label>Password</label>
                                     <input class="form-control" type="password" name="password" autocomplete="off" required="">
                                 </div>
                                 <div class="form-group my-3">
                                     <label>Confirm Password</label>
                                     <input class="form-control" type="password" name="cpassword" autocomplete="off" required="">
                                 </div>


                                 <button type="submit" name="reset" class="btn btn-info">Reset Password </button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </section><!-- End Hero -->


         <?php

         if (isset($_POST['reset'])) {
             //code for captach verification

             $code = $_POST['code'];
             $password = md5($_POST['password']);
             $cpassword = md5($_POST['cpassword']);
             $sql = "update admin set Password=:password where code=:code";
             $query = $dbh->prepare($sql);
             $query->bindParam(':password', $cpassword, PDO::PARAM_STR);
             $query->bindParam(':code', $code, PDO::PARAM_STR);
             $query->execute();
             $_SESSION['message']="Password Reset Successful";
             if(isset($_SESSION['message'])){
                 ?>
                 <script>alert('Password Reset Successfully');
                     window.location='index.php';
                 </script>
                 <?php
             }

         }
         ?>
<?php
 }
 else{
     echo "<h1 class='text-center'>ERROR! 502 Bad GateWay</h1>";
 }
?>



<script>
    $(document).ready(function () {
        $(".btn-close").click(function () {
            $(".alert").fadeOut();
        });

    });
</script>