<?php
include 'config.php';

$error = array(); // Initialize the error array

if (isset($_POST['send'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM signup_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($password != $confirmPassword) {
            $error[] = 'Passwords do not match';
        } else {
            $insert = "INSERT INTO signup_form(name, email, password, user_type) VALUES('$name','$email','$password','$user_type')";
            mysqli_query($conn, $insert);

             // Store the user data in session for later use
             session_start();
             $_SESSION['name'] = $name;
             $_SESSION['email'] = $email;
 

            header('Location: book.php');
            exit;
        }
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

        <a href="home.php" class="logo">Travel</a>

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
        <span class="close-btn" id="form-close">&times;</span>
        <form action="" class="login-form">
            <h3>login</h3>
            <input type="email" name="" class="box" placeholder="enter your email">
            <input type="password" name="" class="box" placeholder="enter your password">
            <input type="submit" class="btn" value="login now">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forgot password? <a href="#">click here</a></p>
            <p>dont have an account?<a href="signup.php">register now</a></p>
        </form>
    </div>
    <!-- signup form started -->
    <div class="signup-form-container">
        <form action="" method="post" class="signup-form" name="myForm" onsubmit="return validateForm()">
            <h3>Signup</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
            }
            ?>
            <input type="text" name="name" class="box" placeholder="Name" id="fname" required><span class="formerror"
                id="error"></span>
            <input type="text" name="email" class="box" placeholder="Email" id="femail" required><span
                class="formerror" id="error1"></span>
            <input type="password" name="password" class="box" placeholder="Password" id="fpassword" required><span
                class="formerror" id="error2"></span>
            <input type="password" name="confirmPassword" class="box" placeholder="Confirm Password" id="fconfirmpass"
                required><span class="formerror" id="error3"></span>
            <select name="user_type" id="">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" class="btn" value="signup now" name="send" id="submit-btn">
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

    <script>
        // Automatically fill the input boxes in the book form with user data
        window.onload = function() {
            var nameInput = document.querySelector('input[name="name"]');
            var emailInput = document.querySelector('input[name="email"]');
            var bookForm = document.getElementById('booking-form');

            // Check if the name and email session variables are set
            if ('<?php echo isset($_SESSION['name']); ?>' && '<?php echo isset($_SESSION['email']); ?>') {
                nameInput.value = '<?php echo $_SESSION['name']; ?>';
                emailInput.value = '<?php echo $_SESSION['email']; ?>';
            }

            // Clear the session variables after filling the input boxes
            <?php unset($_SESSION['name']); ?>
            <?php unset($_SESSION['email']); ?>

            // Submit the book form automatically after filling the input boxes
            bookForm.submit();
        };
    </script>

    <!-- Custom Js Link -->
    <script src="js/script.js"></script>
</body>

</html>
