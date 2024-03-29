<?php
// Check if the session is not already active
if (session_status() === PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

// Check if the user is logged in and the username is set in the session
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
} else {
    // Handle the case when the user is not logged in or the username is not set
    // Redirect or display an appropriate message
    // For example:
    // header('Location: login.php');
    // exit;
}
?>

<section class="header">
    <a href="user_dashboard.php" class="logo">Travel</a>
    <nav class="navbar">
        <a href="user_dashboard.php">Home</a>
        <a href="user_about.php">About</a>
        <a href="user_contact.php">Contact Us</a>
        <a href="package.php">Package</a>
        <a href="my_book.php">My Bookings</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
    <div class="icons"> 
        <!-- <i class="fas fa-search" id="search-btn"></i> -->
        <a href="../unsetvariable.php?unset=true"> <i class="fas fa-sign-out-alt" class="btn"></i></a>
        <i  class="fas fa-user" id="login-btn"></i>
    </div>
</section>
<script>
    document.getElementById("login-btn").addEventListener("click",function(){
        location.href='userProfile.php';
    })
</script>
