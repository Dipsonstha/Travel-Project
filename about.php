<?php
session_start();
$error = array(); // Initialize the error array

if (isset($_POST['send'])) {
    include 'config.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $select = "SELECT * FROM signup_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['password'] == $password) {
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                header('Location: dashboard.php');
                exit;
            } elseif ($row['user_type'] == 'user') {
                header('Location: user_dashboard.php');
                exit;
            }
        } else {
            $error[] = 'Incorrect password!';
        }
    } else {
        $error[] = 'Incorrect email or password!';
    }
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
        <form class="login-form" method="POST">
            <h3>login</h3>
            <?php
    if (!empty($error)) {
    echo '<div class="error-message">';
    foreach ($error as $errorMsg) {
        echo '<span class="error-msg">' . $errorMsg . '</span>';
    }
    echo '</div>';
}
?>
            <input type="email" name="email" class="box" placeholder="enter your email" required >
            <input type="password" name="password" class="box" placeholder="enter your password">
            <input type="submit" name="send" class="btn" value="login now">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p class="forgot-password">Forgot password? <a href="#" id="forgot-password-link">Click here</a></p>
            <p>dont have an account?<a href="signup.php">register now</a></p>
        </form> 
    </div>
<div class="heading" style="background:url(image/slider1.jpg) no-repeat">
<h1>About us</h1>
</div>
<!-- about section starts -->
<section class="about">
    <div class="image">
        <img src="image/about.jpg" alt="">
    </div>
    <div class="content">
        <h3>Why choose us ?</h3>
        <p>When it comes to planning your next adventure in Nepal, choosing our tour and travel management system offers several distinct advantages. Our unparalleled expertise sets us apart from the rest. 
            With years of experience and a deep understanding of Nepal's diverse landscapes, cultural heritage, and the intricacies of the travel industry, we are well-equipped to curate exceptional experiences for our customers.</p>
        <p>One of the key reasons to choose us is our extensive collection of tours. We offer a wide range of options to cater to various interests and preferences. Whether you're an adventure seeker, a nature enthusiast, or a culture lover, our carefully curated selection ensures there's something for everyone. 
            Each tour is thoughtfully designed to showcase the best of Nepal, providing an immersive and authentic experience.</p>
    <div class="icons-container">
        <div class="icons">
            <i class="fas fa-map"></i>
            <span>Top destinations</span>
        </div>
        <div class="icons">
            <i class="fas fa-hand-holding-usd"></i>
            <span>affordable price</span>
        </div>
        
        <div class="icons">
            <i class="fas fa-headset"></i>
            <span>24/7 guide service</span>
        </div>
    </div>
        </div>

</section>
<!-- about section ends   -->
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