<?php
include '../config.php';

session_start();
$user_name=$_SESSION['user_name'];
if(!isset($_SESSION['user_name'])){
    header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Swiper Css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"> 

    <!-- Custom Css link -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>
    <!-- Header Section starts -->
    <?php
    include 'header.php';
    ?>
<!-- Header section Ends -->

<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background:url(../image/slider1.jpg) no-repeat" >
                <div class="content">
                    <span>Explore, Discover, Travel</span>
                    <h3>Travel Nepal</h3>
                    <a href="package.php" class="btn">Discover More</a>

                </div>
            </div>
    </div>
</section>

<!-- Home sectioin ends -->

<!-- Service Section starts -->
<section class="service">
    <h1 class="heading-title">Our Services</h1>
    <div class="box-container">

        <div class="box">
            <img src="../image/icon1.png" alt="">
        <h3>Adventures</h3>
        </div>

        <div class="box">
            <img src="../image/icon2.png" alt="">
        <h3>Tour Guide</h3>
        </div>

        <div class="box">
            <img src="../image/icon3.png" alt="">
        <h3>Trekking</h3>
        </div>

        <div class="box">
            <img src="../image/icon4.png" alt="">
        <h3>Off Road</h3>
        </div>

        <div class="box">
            <img src="../image/icon5.png" alt="">
        <h3>Camping</h3>
        </div>

    </div>
</section>





<!-- Service Section Ends -->

<!-- About section Starts -->
<section class="home-about">
    <div class="image">
        <img src="../image/about.jpg" alt="">
    </div>
    <div class="content">
        <h3>About Us</h3>
        <p>At our tour and travel management system, we are passionate about showcasing the beauty and cultural richness of Nepal. We strive to provide an exceptional online 
            platform that simplifies the process of planning and booking unforgettable travel experiences.</p>
            <p>We believe that traveling is more than just visiting new places; it's about immersing oneself in the local culture, connecting with nature, and creating lifelong memories.
            With this vision in mind, we have curated a diverse collection of tours that encapsulate the essence of Nepal's beauty and heritage.</p>
    <a href="user_about.php" class="btn">read more</a>
            </div>

</section>
<!-- About section Ends -->

<!-- Home Package section Starts -->
<section class="home-packages">
<h1 class="heading">Top destinations</h1>
    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="image/package1.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Mardi</h3>
                    <p>The Himalaya</p>
                    <p>Mardi Himal: A mesmerizing trekking experience in Nepal's Annapurna region, showcasing breathtaking mountain vistas and serene natural beauty.</p>
                </div>
                </div>

            <div class="box">
            <div class="image">
                <img src="image/package7.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Manang</h3>
                <p> Majestic & Magnificent</p>
                <p>Manang: A captivating village in Nepal's Annapurna region, where majestic mountain views and rich Tibetan culture converge, creating a remarkable destination for trekkers and adventure enthusiasts.</p>
                </div>
            </div>

            <div class="box">
            <div class="image">
                <img src="image/package3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>EBC</h3>
                <p>Worlds Highest Peak</p>
                <p>Evesest Base Camp: Where boundless exploration and remarkable discoveries converge in a breathtaking haven.</p>
                </div>
                </div>
        </div>

</section>
<!-- Home package section ends -->
<!-- Footer section   starts -->
<?php
include 'footer.php';
?>
<!-- Footer section ends -->

<!-- Swiper Js Link -->

 <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> 

<!-- Custom Js Link -->

<script  src="../js/script.js"></script>


</body>
</html>