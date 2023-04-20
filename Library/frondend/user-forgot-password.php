<?php
require_once "./includes/header.php";
?>
<section id="" class="d-flex align-items-center">
    <div class="container mt-4">
        <div class="col-md-6 col-sm-6 col-xs-12 mx-auto">
            <div class="card">
                <div class="card-header bg-info">
                    Forgot Password Reset Code
                </div>
                <div class="card-body">
                    <form role="form" method="post" action="sender.php">

                        <div class="form-group mt-3 mb-4">
                            <label>Enter Email</label>
                            <input class="form-control" type="email" name="email" autocomplete="off" required="">
                        </div>

                        <button type="submit" name="send" class="btn btn-danger">Reset </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->