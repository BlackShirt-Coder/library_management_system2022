<?php
session_start();
//require_once "modal.php";

?>

<link rel="stylesheet" href="../node_modules/bootstrap-icons/icons">
<body>

<!-- ======= Top Bar ======= -->

<style>

    .accordion-button::after {
        background-image: none !important;
    }

    .category {
        cursor: pointer;
    }

    .data {
        cursor: pointer;
    }

    .accordion-item:first-of-type .accordion-button {
        border: none !important;
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }

    .author {
        cursor: pointer;
    }


    #herow {
        width: 100%;
        height: 75vh;
        background: linear-gradient(293deg,
        rgba(200, 70, 66, 0.55),
        rgba(8, 83, 156, 0.55)), url(../assets/img/aa.png) center no-repeat !important;
        background-size: cover;
        color: white;
        position: relative;
        overflow: hidden;
    }
</style>
<?php
if (isset($_SESSION['username'])) {
    require_once "./includes/config.php";
    require_once "./includes/header.php";
    require_once "./navbar.php";
    ?>

    <section id="herow" class="d-flex align-items-center">

        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="title my-3"
                style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:4rem;">Welcome
                to <span style="color:blue">UCSTGO</span></h1>
            <h2 class="sub_title" style="font-family:cursive;">You Can Search Your Desired Books In One Place</h2>
            <div class="d-flex">
            </div>
        </div>
    </section><!-- End Hero -->
    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                        Categories
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body" style="max-height:400px;overflow-y: scroll;">
                                        <?php
                                        require_once "includes/config.php";
                                        $status = 1;
                                        $sql = $dbh->prepare("select * from category where Status=:status");
                                        $sql->bindParam("status", $status);
                                        $sql->execute();
                                        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows

                                                 as $data) {
                                            $categoryName = $data['CategoryName'];
                                            $catId = $data['CatId'];
                                            ?>
                                            <p class="category "> <?php echo $categoryName ?><span
                                                        style="opacity: 0"><?php echo $catId ?></span></p>


                                            <?php
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                        Authors
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body author-section "
                                         style="max-height:400px;overflow-y: scroll;">

                                        <?php
                                        require_once "includes/config.php";
                                        $status = 1;
                                        $sql = $dbh->prepare("select * from authors ");
                                        $sql->execute();
                                        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $data) {
                                            $authorName = $data['AuthorName'];
                                            $authorId = $data['AuthorId'];
                                            ?>
                                            <p class="author"><?php echo $authorName ?>
                                                <span style="opacity: 0"><?php echo $authorId ?></span>
                                            </p>

                                            <?php
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                        Request
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                     aria-labelledby="headingThree"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center justify-content-start requestBooks"
                                             style="cursor:pointer;">
                                            <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Request Book</a>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Request Book</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-body p-5">
                                                                <form action="request.php" method="post">
                                                                    <div class="form-group my-1">
                                                                        <label for="rollNumber" class="my-1">Roll Number</label>
                                                                        <input type="text" name="rollNumber" class="form-control">
                                                                    </div>
                                                                    <div class="form-group my-1">
                                                                        <label for="phoneNumber"class="my-1">Phone Number</label>
                                                                        <input type="text" name="phoneNumber" class="form-control">
                                                                    </div>
                                                                    <div class="form-group my-1">
                                                                        <label for="bookName" class="my-1">Book Name</label>
                                                                        <input type="text" name="bookName" class="form-control">
                                                                    </div>
                                                                    <input type="submit" value="Request" name="request" class="request btn btn-primary my-3">
                                                                </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                    <div class="col-9">
                        <div class="content"></div>
                    </div>

                </div>
            </div>
            </div>



        </section><!-- End Featured Services Section -->

        <!-- ======= About Section ======= -->


        <!-- ======= Frequently Asked Questions Section ======= -->

        <!-- ======= Contact Section ======= -->

    </main><!-- End #main -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
    <?php
} else {
    ?>
    <?php
    header("Location:index.php");
}
?>


<?php
require_once "./includes/footer.php";
?>
<script>
    var categories = document.querySelector(".accordion-body");
    var authors = document.querySelector(".author-section");
    var author = document.querySelector(".author");
    var requestBook = document.querySelector(".requestBook");
    var content = document.querySelector(".content");
    var search = document.querySelector(".search");
    var live_search = document.querySelector("#live_search");
    window.onload = function () {
        $.ajax({
            type: "POST",
            url: "bestborrowbook.php",
            success: function (msg) {
                content.innerHTML = msg;


            },
            error: function () {
                alert("failure");
            }
        });
    }


    categories.onclick = function (e) {
        var value = e.target;
        console.log(value);
        if (categories !== value) {
            var id = value.childNodes[1].innerText;

            $.ajax({
                type: "POST",
                url: "filter.php?q=" + id,
                success: function (msg) {
                    content.innerHTML = msg;

                },
                error: function () {
                    alert("failure");
                }
            });
        }
    }


    authors.onclick = function (e) {
        var value = e.target;
        if (authors !== value) {
            var aid = value.childNodes[1].innerText;
            $.ajax({
                type: "POST",
                url: "authorFilter.php?q=" + aid,
                success: function (msg) {
                    content.innerHTML = msg;
                },
                error: function () {
                    alert("failure");
                }
            })
        }
    }


    $("#search_result").click(function (e) {
        var text = e.target.innerText;
        $.ajax({
            type: "POST",
            url: "search.php?q=" + text,
            success: function (msg) {
                content.innerHTML = msg;
            },
            error: function () {
                alert("failure");
            }
        })

    });
    search.onclick = function (e) {
        $text = live_search.value;
        var text = e.target.value;
        $.ajax({
            type: "POST",
            url: "search.php?q=" + text,
            success: function (msg) {
                content.innerHTML = msg;
            },
            error: function () {
                alert("failure");
            }
        })
    }


</script>
