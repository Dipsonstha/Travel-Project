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
            <p class="forgot-password">Forgot password? <a href="#" id="forgot-password-link">Click here</a></p>
            <p>dont have an account?<a href="signup.php">register now</a></p>
        </form> 
    </div>
    <!-- Home section starts -->
    <section class="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide" style="background:url(image/slider1.jpg) no-repeat" >
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
                <img src="image/icon1.png" alt="">
            <h3>Adventures</h3>
            </div>

            <div class="box">
                <img src="image/icon2.png" alt="">
            <h3>Tour Guide</h3>
            </div>

            <div class="box">
                <img src="image/icon3.png" alt="">
            <h3>Trekking</h3>
            </div>

            <div class="box">
                <img src="image/icon4.png" alt="">
            <h3>Off Road</h3>
            </div>

            <div class="box">
                <img src="image/icon5.png" alt="">
            <h3>Camping</h3>
            </div>

        </div>
    </section>





    <!-- Service Section Ends -->

    <!-- About section Starts -->
    <section class="home-about">
        <div class="image">
            <img src="image/about.jpg" alt="">
        </div>
        <div class="content">
            <h3>About Us</h3>
            <p>At our tour and travel management system, we are passionate about showcasing the beauty and cultural richness of Nepal. We strive to provide an exceptional online 
                platform that simplifies the process of planning and booking unforgettable travel experiences.</p>
                <p>We believe that traveling is more than just visiting new places; it's about immersing oneself in the local culture, connecting with nature, and creating lifelong memories.
                With this vision in mind, we have curated a diverse collection of tours that encapsulate the essence of Nepal's beauty and heritage.</p>
        <a href="about.php" class="btn">read more</a>
                </div>

    </section>
    <!-- About section Ends -->

    <!-- Home Package section Starts -->
    <section class="home-packages">
        <h1 class="heading">our packages</h1>
        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="image/package1.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Lotshe</h3>
                    <p>The Himalaya</p>
                    <a href="book.php" class="btn">Book</a>
                    </div>
                    </div>

                <div class="box">
                <div class="image">
                    <img src="image/package2.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Adventure & Tour</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <a href="book.php" class="btn">Book</a>
                    </div>
                </div>

                <div class="box">
                <div class="image">
                    <img src="image/package3.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Adventure & Tour</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <a href="book.php" class="btn">Book</a>
                    </div>
                    </div>
            </div>
            <div class="load-more"><a href="package.php" class="btn">load more</a></div>
        </div>

    </section>
    <!-- Home package section ends -->
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