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
        <a href="book.php">Book</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
          <div class="icons"> 
            <!-- <i class="fas fa-search" id="search-btn"></i> -->
             <i class="fas fa-user" id="login-btn"></i>
</div>
    </section>

<!-- Header section Ends -->
<div class="heading" style="background:url(image/slider3.jpg) no-repeat">
<h1>Book</h1>
</div>
<!-- Booking section starts -->
<section class="booking">

<h1 class="heading-title">Book your Trip!</h1>

<form action="book_form.php" method="post" class="booking-form">

<div class="flex">
    <div class="inputBox">
        <span>name :</span>
        <input type="text" placeholder="enter your name" name="name">
    </div>
    <div class="inputBox">
        <span>email :</span>
        <input type="email" placeholder="enter your email" name="email">
    </div>
    <div class="inputBox">
        <span>phone :</span>
        <input type="text" placeholder="enter your number" name="phone" max="10">
    
    </div>
    <div class="inputBox">
        <span>address :</span>
        <input type="text" placeholder="enter your address" name="address">
    
    </div>
    <div class="inputBox">
        <span>where to  :</span>
        <input type="text" placeholder="enter your destination" name="location">
    </div>

        <div class="inputBox">
        <span>How many  :</span>
        <input type="number" placeholder="enter number of people" name="guests">
    </div>
    
    <div class="inputBox">
        <span>Arrivals :</span>
        <input type="date" name="arrivals">
    </div>

    <div class="inputBox">
        <span>leaving :</span>
        <input type="date" name="leaving">
    </div>
</div>
<input type="submit" value="submit" class="btn" name="send">
</form>
</section>
<!-- Booking section ends   -->
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
