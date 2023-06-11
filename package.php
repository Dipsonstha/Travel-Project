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
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <!-- Header Section starts -->
    <section class="header">

        <a href="home.php" class="logo">Travel </a>
      
        <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">About</a>
        <a href="package.php">Package</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
          <div class="icons"> 
            <!-- <i class="fas fa-search" id="search-btn"></i> -->
             <i class="fas fa-user" id="login-btn"></i>
</div>
    </section>

<!-- Header section Ends -->
    <!-- login form container -->
    <div class="login-form-container">
    <span class="close-btn" id="form-close">&times;</span>
        <form action="" class="login-form">
            <h3>login</h3>
            <input type="email" class="box" placeholder="enter your email" required >
            <input type="password" class="box" placeholder="enter your password">
            <input type="submit" class="btn" value="login now">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p class="forgot-password">Forgot password? <a href="#" id="forgot-password-link">Click here</a></p>
            <p>dont have an account?<a href="signup.php">register now</a></p>
        </form>
    </div>

<div class="heading" style="background:url(image/package5.jpg) no-repeat">
<h1>Package</h1>
</div>
<!-- Package section starts -->
<section class="packages">
    <h1 class="heading-title">
        Top destinations
    </h1>
    <div class="box-container">
        <!-- <?php
        // $conn = mysqli_connect("localhost","root","","");
        // $sql = "SELECT * FROM package";
        // $result = mysqli_query($conn,$sql);
        // while($row = mysqli_fetch_assoc($result))
            // echo '<div class="box">
            // <div class="image"><img src="image/'.$packageImg.'" alt="">
        // </div>
        // <div class="content">
            // <h3>'.$packageName.'</h3
            // <p>'.$packageType.'</p>
            // <p class="tour-details">Cost: NRS '.$packageName.' per person | Duration: '.$packageName.' days | Start: '.$packageName.' | End: '.$packageName.' | Inclusive: '.$packageName.'</p>
            // <a href="book.php?packageid='.$packageName.'" class="btn">Book Now</a>
        
        // </div>';
         ?> -->
        <div class="box">
            <div class="image"><img src="image/package1.jpg" alt="">
        </div>
        <div class="content">
            <h3>Mardi Himal</h3>
            <p>Trekking</p>
            <p class="tour-details">Cost: NRS 7000 per person | Duration: 7 days | Start: 10th June | End: 17th June | Inclusive: Transportation, Food, Guide</p>
            <a href="#" class="btn">Book Now</a>
        
        </div>
        </div>

        <div class="box">
            <div class="image"><img src="image/package7.jpg" alt="">
        </div>
        <div class="content">
            <h3>Manang</h3>
            <p>Trekking & Adventure</p>
            <p class="tour-details">Cost: NRS 15000 per person | Duration: 10 days | Start: 10th June | End: 20th June | Inclusive: Transportation, Food, Guide</p>
            <a href="#" class="btn">Book Now</a>
        
        </div>
        </div>

        <div class="box">
            <div class="image"><img src="image/package3.jpg" alt="">
        </div>
        <div class="content">
            <h3>Everest Base Camp (EBC)</h3>
            <p>Adventure, Trekking & Camping</p>
            <p class="tour-details">Cost: NRS 25000 per person | Duration: 14 days | Start: 10th June | End: 24th June | Inclusive: Transportation, Food, Guide</p>
            <a href="#" class="btn">Book Now</a>
        
        </div>
        </div>

        <div class="box">
            <div class="image"><img src="image/mustang.jpg" alt="">
        </div>
        <div class="content">
            <h3>Mustang</h3>
            <p>Offroad & Adventure</p>
            <p class="tour-details">Cost: NRS 15000 | Duration: 7 days | Start: 10th June | End: 17th June | Inclusive: Transportation, Food, Guide</p>
            <a href="#" class="btn">Book Now</a>
        
        </div>
        </div>

        <div class="box">
            <div class="image"><img src="image/package5.jpg" alt="">
        </div>
        <div class="content">
            <h3>Aama Yangri</h3>
            <p>Camping & Trekking</p>
            <p class="tour-details">Cost: NRS 3500 | Duration: 3 days | Start: 11th June | End: 14th June | Inclusive: Transportation, Food, Guide</p>
            <a href="#" class="btn">Book Now</a>
        
        </div>
            </div>

        <div class="box">
            <div class="image"><img src="image/package6.jpg" alt="">
        </div>
        <div class="content">
            <h3>Upper Dolpa</h3>
            <p>Adventure & Trekking</p>
            <p class="tour-details">Cost: NRS 40000 | Duration: 18 days | Start: 10th June | End: 28th June | Inclusive: Transportation, Food, Guide</p>
            <a href="#" class="btn">Book Now</a>
        
        </div>
        </div>

 
    </div>
    
    <div class="load-more"><span class="btn">load more</span></div>
    
</section>
<!-- Package section ends -->
<!-- Foter section   starts -->
    <section class="footer">
        
    <div class="box-container">
       <div class="box"> 
       <h3>Quick Links</h3>

        <a href="home.php"> <i class="fas fa-angle-right"></i>home</a>
        <a href="about.php"> <i class="fas fa-angle-right"></i>About</a>
        <a href="package.php"><i class="fas fa-angle-right"></i>Package</a>
        <a href="book.php"><i class="fas fa-angle-right"></i>Book</a>
        
    </div>

        <div class="box">
            <h3>Extra Links</h3>
            
            <a href="#"> <i class="fas fa-angle-right"></i>Ask Question</a>
            <a href="#"> <i class="fas fa-angle-right"></i>About Us</a>
            <a href="#"><i class="fas fa-angle-right"></i>Privacy Policy</a>
            <a href="#"><i class="fas fa-angle-right"></i>Terms of Use</a>
 
 
        </div>

        <div class="box">
            <h3>Contact Us</h3>
            
            <a href="#"> <i class="fas fa-phone"></i>+977-9874561230</a>
            <a href="#"> <i class="fas fa-phone"></i>01-1234567</a>
            <a href="#"><i class="fas fa-envelope"></i>TravelNepal@gmail.com</a>
            <a href="#"><i class="fas fa-map"></i>kathmandu-13, Nepal</a>
 
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i>facebook</a>
            <a href="#"> <i class="fab fa-instagram"></i>instagram</a>
            <a href="#"><i class="fab fa-twitter"></i>twitter</a>
            <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
 
        </div>
</div>
    </section>
<!-- Footer section ends -->

<!-- Swiper Js Link -->

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Custom Js Link -->

<script src="js/script.js"></script>

</body>
</html>