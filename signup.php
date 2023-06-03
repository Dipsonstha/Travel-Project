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
        <!-- login form container -->
    <div class="login-form-container">
        <i class="fas fa-time" id="form-close"></i>
        <form action="" class="login-form">
            <h3>login</h3>
            <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="enter your password">
            <input type="submit" class="btn" value="login now">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forgot password? <a href="#">click here</a></p>
            <p>dont have an account?<a href="signup.php">register now</a></p>
        </form>
    </div>
        <!-- signup form started -->    
        <div class="signup-form-container">
    <form action="signup_form.php" method="post" class="signup-form">
    <h3>Signup</h3>
    <input type="text" name="name" class="box" placeholder="Name" required>
      <input type="email" name="email" class="box" placeholder="Email" required>
      <input type="password" name="password" class="box" placeholder="Password" required>
      <input type="password" name="confirmPassword" class="box" placeholder="Confirm Password" required>
      <input type="tel" name="phone" class="box" placeholder="Phone number">
      <label for="terms">
        <input type="checkbox" id="terms" name="terms" required>
        I agree to the terms and conditions
      </label>
      <input type="submit" class="btn" value="signup now" name="send">        
     </form>
</div>
    <!-- signup form ended -->
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

    <script  src="js/script.js"></script>


    </body>
    </html>