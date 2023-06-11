<?php
include 'config.php';

$packageName = "";
$packageType = "";
$cost = "";
$duration = "";
$startDate = "";
$endDate = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $packageName = $_POST["packageName"];
    $packageType = $_POST["packageType"];
    $cost = $_POST["cost"];
    $duration = $_POST["duration"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // Perform form validation
    if (empty($packageName) || empty($packageType) || empty($cost) || empty($duration) || empty($startDate) || empty($endDate)) {
        $errorMessage = "All the fields are required";
    } else {
        // Add new package to the database
        $sql = "INSERT INTO `package` (PackageName, PackageType, Cost, Duration, StartDate, EndDate) VALUES ('$packageName', '$packageType', '$cost', '$duration', '$startDate', '$endDate')";
        
        if ($conn->query($sql) === true) {
            $successMessage = "Package added successfully";
            
            // Reset form fields after successful insertion
            $packageName = "";
            $packageType = "";
            $cost = "";
            $duration = "";
            $startDate = "";
            $endDate = "";
        } else {
            $errorMessage = "Error: " . $conn->error;
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
    <title>Add Package</title>
    
     <!-- Swiper Css link -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"> 


    <!-- Custom CSS link -->
    <link rel="stylesheet" href="css/admin_style.css">

        <!-- Font awsome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>
<body>
<section class="header">
    <div class="flex">
    <a href="dashboard.php" class="logo"> <span> Admin Panel </span></a>
    <nav class="navbar">
        <a href="dashboard.php">Dashboard</a>
        <a href="admin_package.php">Packages</a>
        <a href="#">Bookings</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
    <div class="icons"> 
    <!-- logout btn -->
    <a href="home.php"> <i class="fas fa-user" id="login-btn"></i></a>
    </div>
    </div>
</section>

<div class="add-products">
    <h1 class="heading-title">Add New Packages</h1>
    <form action="" method="post">
        <div class="flex">
            <div class="inputBox">
            <span>Package Name :</span>
                <input type="text" name="packageName" value="<?php echo $packageName; ?>">
            </div>
            
            <div class="inputBox">
            <span>Package Type :</span>
            <input type="text" name="packageType" value="<?php echo $packageType; ?>">
            </div>
            
            <div class="inputBox">
            <span>Cost :</span>    
            <input type="text" name="cost" value="<?php echo $cost; ?>">
            </div>
            
            <div class="inputBox">
            <span>Duration :</span>
                <input type="text" name="duration" value="<?php echo $duration; ?>">
            </div>
            
            <div class="inputBox">
            <span>Start Date :</span>
                <input type="date" name="startDate" value="<?php echo $startDate; ?>">
            </div>
            
            <div class="inputBox">
            <span>End Date :</span>
                <input type="date" name="endDate" value="<?php echo $endDate; ?>">
            </div>
            <div class="button">
                <button type="submit" class="btn">Submit</button>
                <a href="admin_package.php" role="button" class="btn">Back</a>
            </div>
        </div>
    </form>
    <?php if (!empty($errorMessage)) { ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php } ?>
    <?php if (!empty($successMessage)) { ?>
        <div class="success-message"><?php echo $successMessage; ?></div>
    <?php } ?>
</div>


<!-- Swiper Js Link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> 

<!-- Custom Js Link -->
<script  src="js/script.js"></script>

</body>
</html>
