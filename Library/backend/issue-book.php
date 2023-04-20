<?php
session_start();
 error_reporting(0);
include('includes/config.php');

?>
<?php
require_once "header.php";
require_once "aside.php";
require_once "sidebar.php";
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['issue'])) {
        $rollNumber= strtoupper($_POST['rollNumber']);
        $bookid = $_POST['bookdetails'];
        $sql = "INSERT INTO  borrow(rollNumber,BookId) VALUES(:rollNumber,:bookid)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':rollNumber', $rollNumber, PDO::PARAM_STR);
        $query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
       $res= $query->execute();
       if($res){
           echo "<script>alert('Successful');</script>";
       }
        ############### Before Use Triggers ###################

//        $lastInsertId = $dbh->lastInsertId();
//        if ($lastInsertId) {
//            $_SESSION['msg'] = "Book issued successfully";
//            $sql1 = "select*from books where BookId=:bookId";
//            $query = $dbh->prepare($sql1);
//            $query->bindParam("bookId",$bookid);
//            $query->execute();
//            $row=$query->fetchAll();
//            foreach ($row as $data){
//                $stock= $data['AvailableBook'];
//                $stock=$stock-1;
//                $sql2=$dbh->prepare("update books set AvailableBook=:stock where BookId=:id");
//                $sql2->bindParam("stock",$stock);
//                $sql2->bindParam("id",$bookid);
//                $sql2->execute();
//            }
//
//        } else {
//            $_SESSION['error'] = "Something went wrong. Please try again";
//            header('location:manage-issued-books.php');
//        }
                  ###################### End ######################
    }
}
?>


<script>
    function getstudent() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "get_student.php",
            data: 'rollNumber=' + $("#rollNumber").val(),
            type: "POST",
            success: function (data) {
                $("#get_student_name").html(data);
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

    //function for book details
    function getbook() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "get_book.php",
            data: 'bookid=' + $("#bookid").val(),
            type: "POST",
            success: function (data) {
                $("#get_book_name").html(data);
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

</script>
    <div class="content-wrapper" style="min-height: 1302.12px;">
        <section class="content">

            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Add Issued Books</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post">

                                <div class="form-group">
                                    <label>Roll Number<span style="color:red;">*</span></label>
                                    <input class="form-control" type="text" name="rollNumber" id="rollNumber" value="UCSTGO-"
                                           onBlur="getstudent()" autocomplete="off" required/>
                                </div>

                                <div class="form-group">
                                    <span id="get_student_name" style="font-size:16px;"></span>
                                </div>


                                <div class="form-group">
                                    <label>Enter ISBN Number<span style="color:red;">*</span></label>
                                    <input class="form-control" type="text" name="booikid" id="bookid"
                                           onBlur="getbook()" required="required"/>
                                </div>

                                <div class="form-group">

                                    <select class="form-control" name="bookdetails" id="get_book_name" readonly>
                                    </select>
                                </div>
                                <button type="submit" name="issue" id="submit" class="btn btn-info text-white">
                                    Issue Book
                                </button>

                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </section>
    </div>

<!-- /.container-fluid -->
<?php
require_once "footer.php";
require_once "copyright.php";
?>
<script src="script.js"></script>
