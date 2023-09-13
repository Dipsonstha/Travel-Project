<?php
// Check if the session is not already active
if (session_status() === PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

// Check if the user is logged in and the username is set in the session
if (isset($_SESSION['admin_name'])) {
    $admin_name = $_SESSION['admin_name'];
} else {
    // Handle the case when the user is not logged in or the username is not set
    // Redirect or display an appropriate message
    // For example:
    // header('Location: login.php');
    // exit;
}
?>
<section class="header">
<div class="flex">
    <a href="dashboard.php" class="logo"><span> Admin Panel </span></a>
    
    <nav class="navbar">
        <a href="dashboard.php">Dashboard</a>
        <a href="admin_package.php">Packages</a>
        <a href="book.php">Bookings</a>
        <a href="contact.php">Contacts</a>
        <a href="users.php">Users</a>
    </nav>
    
    <div id="menu-btn" class="fas fa-bars"></div>
    
    <div class="icons"> 
        <a href="../home.php"><i class="fas fa-sign-out-alt"></i></a>
        <i class="fas fa-user" id="login-btn"><?php echo isset($admin_name) ? $admin_name : ''; ?></i>
    </div>
</div>
</section>
