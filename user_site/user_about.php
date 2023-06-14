<!-- <?php
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
?> -->
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
<div class="heading" style="background:url(../image/slider1.jpg) no-repeat">
<h1>About us</h1>
</div>
<!-- about section starts -->
<section class="about">
    <div class="image">
        <img src="../image/about.jpg" alt="">
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
  <?php 
  include '../footer.php';
  ?>
    <!-- Footer section ends -->
    
    <!-- Swiper Js Link -->
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
    <!-- Custom Js Link -->
    
    <script src="../js/script.js"></script>
    
    </body>
    </html>