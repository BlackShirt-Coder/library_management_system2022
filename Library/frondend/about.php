<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UCSTGO | Library Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'includes/ajax.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');

                            $("#live_search").focusin(function () {
                                $('#search_result').css('display', 'block');
                            });
                        }
                    });
                } else {
                    $('#search_result').css('display', 'none');
                }
            });
        });
    </script>
    <style>
        .scrollable-menu {
            height: auto;
            max-height: 500px;
            overflow-x: hidden;
        }
        .live_search::placeholder{
            font-size:13px;
        }
    </style>

</head>
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.php"><img src="assets/img/logo.png"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="home.php">Home</a></li>
                <li><a class="nav-link scrollto " href="about.php">About</a></li>
                <li><a class="nav-link scrollto " href="contact.php">Contact</a></li>


                <li>
                    <input type="text" class="form-control live_search" name="live_search" id="live_search" autocomplete="off"
                           placeholder="AuthorName OR Book Title...">
                    <div id="search_result" style="background-color:#ffff;position: absolute;"></div>

                </li>
                <li class="dropdown"><a href="#"><span><?php
                            if(isset($_SESSION['fullName'])){
                                echo $_SESSION['fullName'];
                            }
                            else{
                                echo "Register";
                            }
                            ?></span> <i class="bi bi-chevron-down"></i></a>
                    <ul>

                        <?php
                        if(isset($_SESSION['fullName'])){
                            echo "  <li><a href='profile.php'>Profile</a></li>";
                            echo "  <li><a href='logout.php'>Logout</a></li>";
                        }
                        else{
                            echo "<li><a href='login.php'>Sign In</a></li>";
                            echo "<li><a href='signup.php'>Sign Up</a></li>";
                        }

                        ?>
                    </ul>

                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>About</h2>
            <h3>Find Out More <span>About Us</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque
                vitae autem.</p>
        </div>

        <div class="row">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up"
                 data-aos-delay="100">
                <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore
                    magna aliqua.
                </p>
                <ul>
                    <li>
                        <i class="bx bx-store-alt"></i>
                        <div>
                            <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                            <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
                        </div>
                    </li>
                    <li>
                        <i class="bx bx-images"></i>
                        <div>
                            <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                            <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata
                                redi</p>
                        </div>
                    </li>
                </ul>
                <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                    in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum
                </p>
            </div>
        </div>

    </div>
</section><!-- End About Section -->
