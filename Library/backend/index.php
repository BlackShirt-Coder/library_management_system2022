<?php
session_start();

?>

<style>
    #chart-container {
        width: 100%;
        height: auto;
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .card-body {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }
</style>
<?php
if (isset($_SESSION['login'])) {
require_once "header.php";
require_once "aside.php";
require_once "navbar.php";
echo "<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Signed in successfully'
})

</script>";
?>


<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
                        require_once "includes/config.php";
                        $sql = "SELECT BookId from books";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $listdbooks = $query->rowCount();
                        ?>
                        <h3><?php echo htmlentities($listdbooks); ?></h3>

                        <p>Book List</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="manage-books.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">

                        <?php
                        $sql1 = "SELECT BorrowId from borrow ";
                        $query1 = $dbh->prepare($sql1);
                        $query1->execute();
                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                        $issuedbooks = $query1->rowCount();
                        ?>
                        <h3><?php echo htmlentities($issuedbooks); ?> </h3>
                        <p> Issued Books</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="manage-issued-books.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php
                        $sql3 = "SELECT rollNumber from students ";
                        $query3 = $dbh->prepare($sql3);
                        $query3->execute();
                        $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                        $regstds = $query3->rowCount();
                        ?>
                        <h3><?php echo htmlentities($regstds); ?></h3>

                        <p>Registered Students</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="reg-students.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <?php
                        $sql = "SELECT AuthorId from authors ";
                        $query4 = $dbh->prepare($sql);
                        $query4->execute();
                        $results4 = $query4->fetchAll(PDO::FETCH_OBJ);
                        $listdathrs = $query4->rowCount();
                        ?>
                        <h3><?php echo htmlentities($listdathrs); ?></h3>
                        <p>Authors Listed</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="manage-authors.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            ကုန်နေသောစာအုပ်များ
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>BookName</th>
                                <th>AvailableBook</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $AvailableBook = 0;
                            $sql = "SELECT * from books where AvailableBook=:AvailableBook";
                            $query = $dbh->prepare($sql);
                            $query->bindParam("AvailableBook", $AvailableBook);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results

                                         as $result) {

                                    ?>

                                    <tr>
                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                        <td class="center"><?php echo htmlentities($result->BookName); ?></td>
                                        <td class="center"><?php echo htmlentities($result->AvailableBook); ?></td>

                                    </tr>

                                    <?php
                                    $cnt = $cnt + 1;
                                }

                            } else {
                                ?>

                                <h3 class="card-title text-primary">
                                    ကုန်နေသောစာအုပ်များမရှိသေးပါ။
                                </h3>
                                <br>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                           အငှားအများဆုံးစာအုပ်
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <table id="example4" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>BookName</th>
                                <th>Cover Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = $dbh->prepare("select * from borrow group by(BookId) having count(BookId)>2");

                            $sql->execute();
                            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                            if ($sql->rowCount() > 0) {
                            foreach ($rows as $data) {
                                $id = $data["BookId"];
                                $sql = $dbh->prepare("select * from books where BookId=:bookId");
                                $sql->bindParam(":bookId", $id);
                                $sql->execute();
                                $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $result) {
                                    ?>

                                    <tr>

                                        <td class="center"><?php echo $cnt; ?></td>
                                        <td class="center"><?php echo htmlentities($result['BookName']); ?></td>
                                        <td class="center"><img style="width:50px;height:50px;" src="../assets/img/<?php echo htmlentities($result['cover_img']); ?>"></td>


                                    </tr>

                                    <?php
                                    $cnt = $cnt + 1;

                                }
                            }

                            } else {
                                ?>

                                <h3 class="card-title text-primary">

                                    အငှားအများဆုံးစာအုပ်မရှိသေးပါ။
                                </h3>
                                <br>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            စာအုပ်ပြန်မအပ်ရသေးသူများ
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Book Name</th>
                                <th>Student Name</th>
                                   <th>Phone Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $status = 0;
                            $sql = $dbh->prepare("SELECT students.userName,books.BookName,students.phoneNumber from students INNER JOIN borrow ON borrow.rollNumber=students.rollNumber 

                                INNER JOIN books ON books.BookId=borrow.BookId
                               WHERE borrow.RetrunStatus=:status;
");
                            $sql->bindParam(":status", $status);
                            $sql->execute();
                            $row = $sql->fetchAll(PDO::FETCH_OBJ);
                           if($sql->rowCount()>0){
                               foreach ($row

                                        as $result){
                                   ?>
                                   <tr>
                                   <td class="center">
                                       <?php echo htmlentities($cnt); ?></td>
                                   <td class="center">
                                       <?php echo htmlentities($result->BookName); ?></td>
                                       <td class="center">
                                       <?php echo htmlentities($result->userName); ?></td>
                                        <td class="center">
                                       <?php echo htmlentities($result->phoneNumber); ?></td>
                                   <?php
                               }
                               ?>


                            <?php
                            $cnt = $cnt + 1;

                            }

                                                                else {
                                                             ?>

                            <h3 class="card-title text-primary">

                                ကုန်နေသောစာအုပ်များမရှိသေးပါ။
                            </h3>
                            <br>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            အငှားအများဆုံးကျောင်းသား
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Phone Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = $dbh->prepare("select * from borrow group by(rollNumber) having count(rollNumber)>=2");
                            $sql->execute();
                            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                            if ($sql->rowCount() > 0) {
                            foreach ($rows as $data) {
                                $sid = $data["rollNumber"];
                                $sql = $dbh->prepare("select * from students where rollNumber=:stuId");
                                $sql->bindParam(":stuId", $sid);
                                $sql->execute();
                                $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $items) {
                                    ?>

                                    <tr>
                                        <td class="center"><?php echo $cnt; ?></td>
                                        <td class="center"><?php echo $items["userName"]; ?></td>
                                        <td class="center"><?php echo $items["phoneNumber"]; ?></td>

                                    </tr>

                                    <?php
                                    $cnt = $cnt + 1;
                                }
                            }

                            } else {
                                ?>

                                <h3 class="card-title text-primary">

                                    အငှားအများဆုံးကျောင်းသားမရှိသေးပါ။
                                </h3>
                                <br>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div>


            </section>
            <!-- right col -->
        </div>


        <!-- /.content -->

        <!-- /.content-wrapper -->

        <?php

        require_once "footer.php";

        }
        else {
            echo "
        <script>window.location.href = 'login.php'</script>
        ";

        }
        ?>



        <script src="script.js"></script>


