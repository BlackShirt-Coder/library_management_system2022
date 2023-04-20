<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="home.php"><img src="../assets/img/logo.png"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="home.php">Home</a></li>
                <!-- <li><a class="nav-link scrollto " href="about.php">About</a></li>
                <li><a class="nav-link scrollto " href="contact.php">Contact</a></li> -->


                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="text" class="form-control live_search" name="live_search" id="live_search"
                               autocomplete="off"
                               placeholder="Search...">
                       <div class="rounded pt-2 ms-1" style="width: 40px;height:40px;background-color: #f5f3f5;cursor:pointer; padding-left: 5px;"> <i class="search bi bi-search h5"></i></div>
                    </div>
                    <div id="search_result" style="background-color:#ffff;position: absolute;"></div>

                </li>
                <li class="dropdown"><a href="#"><span><?php
                            if (isset($_SESSION['username'])) {
                                echo $_SESSION['username'];
                            } else {
                                echo "Register";
                            }
                            ?></span> <i class="bi bi-chevron-down"></i></a>
                    <ul>

                        <?php
                        if (isset($_SESSION['username'])) {
                            // echo "  <li><a href='profile.php'>Profile</a></li>";
                            echo "  <li><a href='logout.php'>Logout</a></li>";
                        } else {
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
     