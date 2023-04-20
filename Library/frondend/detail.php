<?php
require_once "./includes/config.php";
require_once "./includes/header.php";

?>
    <body>


<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">
            <div class="row">
<span class="text-success">Author's Books</span>
                <?php
                    require_once "includes/config.php";
                    $id = $_GET['id'];
                    $sql = $dbh->prepare("SELECT *from books  where AuthorId=:id");
                    $sql->bindParam("id", $id);
                    $sql->execute();
                    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($rows

                    as $data) {
                    $stock = $data['Stock'];
                    ?>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 mt-4">
                        <div class="card p-5">
                        <div>
                            <p class=""><?php echo $data["BookName"] ?></p>
                            <img style="width:200px;" src="assets/img/<?php echo $data['cover_img'] ?>">
                        </div>
                        <div>
                            <?php

                            $sql = $dbh->prepare("SELECT *from tblauthors  where id=:id");
                            $sql->bindParam("id", $id);
                            $sql->execute();
                            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows

                            as $data) {

                            ?>
                            <p>Author: <span><?php echo $data["AuthorName"] ?></span></p>
                            <p>
                                Stock: <?php echo $stock >= 1 ? "<span class='text-info'>Available</span>" : "<span class='text-danger'>Not Available</span>" ?></p>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                ?>
            </div>


    </section><!-- End Featured Services Section -->


</main><!-- End #main -->
<footer id="footer">


    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>BizLand<span>.</span></h3>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
<?php
require_once "./includes/footer.php";
?>