<?php
include("config/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
    <?php
    include("includes/header_files1.php");
    ?>
</head>

<body>
    <?php
    include("includes/navbar.php");
    ?>

    <main>

        <section class="main-section cd-slider">
            <ul>
                <li style="background:url('images/car-13.jpg') no-repeat;background-size:cover;" data-color="#1B1B1D">
                    <!--        <img src="img/macbook-pro.png" class="head_img">-->
                    <div class="htxt_div">
                        <p class="head_txt"> BOOK A RIDE WITH <span> RENTAL CARS</span></p>

                    </div>
                </li>
            </ul>

        </section>

        <section class="main-section brag-sec">


            <div class="brag_cont">



                <div class="brag_txt">


                    <h2> Why to choose <span class="sp_txt"> CAR RENTALS</span> ?</h2>
                    <p>

                        We are the one stop solution for all the hurdles faced by you. Get the best service with CAR
                        RENTALS

                    </p>


                </div>

                <div class="brag_points">

                    <div class="brag_com brag_left">

                        <div class="brag_point1 brag_div" data-aos="zoom-out-right">

                            <img src="images/fixed-price.png">
                            <h3> Fixed Prices</h3>
                            <p>

                            </p>
                        </div>

                        <div class="brag_point2 brag_div" data-aos="zoom-in-up">
                            <img src="images/one-stop.png">
                            <h3> One Stop Solution</h3>
                            <p>

                            </p>
                        </div>

                    </div>

                    <div class="brag_com brag_right">

                        <div class="brag_point3 brag_div" data-aos="zoom-out-down">
                            <img src="images/fast_service.jpg">
                            <h3> Fast Service</h3>
                            <p>

                            </p>
                        </div>

                        <div class="brag_point4 brag_div" data-aos="zoom-out">
                            <img src="images/satisfied.png">
                            <h3>Satisfied Customers</h3>
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php include("includes/footer.php"); ?>



    </main>

</body>

</html>