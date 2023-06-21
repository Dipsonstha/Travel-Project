<?php
require_once '../config.php';

$packageName = "";
$packageType = "";
$cost = "";
$duration = "";
$startDate = "";
$endDate = "";
$image = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $packageName = $_POST["packageName"];
    $packageType = $_POST["packageType"];
    $cost = $_POST["cost"];
    $duration = $_POST["duration"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $image = $_FILES["image"]["name"]; // Get the name of the uploaded file

    // Perform form validation
    if (empty($packageName) || empty($packageType) || empty($cost) || empty($duration) || empty($startDate) || empty($endDate) || empty($image)) {
        $errorMessage = "All fields are required";
    } else {
        // Move the uploaded file to a desired location
        $targetDir = "image/"; // Specify the directory where you want to save the uploaded images

        // Check if the target directory exists, if not, create it
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $targetFilePath = $targetDir . basename($image);
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Image uploaded successfully, now save the file path to the database
            $image = $targetFilePath;

            // Add new package to the database
            $sql = "INSERT INTO `package` (PackageName, PackageType, Cost, Duration, StartDate, EndDate, image) VALUES ('$packageName', '$packageType', '$cost', '$duration', '$startDate', '$endDate', '$image')";
            
            if ($conn->query($sql) === true) {
                $successMessage = "Package added successfully";
                
                // Reset form fields after successful insertion
                $packageName = "";
                $packageType = "";
                $cost = "";
                $duration = "";
                $startDate = "";
                $endDate = "";
                $image = "";
            } else {
                $errorMessage = "Error: " . $conn->error;
            }
        } else {
            $errorMessage = "Failed to upload the image";
        }
    }
}
?>

<!-- Rest of the HTML code remains unchanged -->


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
    <link rel="stylesheet" href="../css/admin_style.css">

        <!-- Font awsome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>
<body>
    <?php
    include 'header.php';   
    ?>

<div class="add-products">
    <h1 class="heading-title">Add New Packages</h1>
    <form action="" method="post" enctype="multipart/form-data" id="add-package">
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
                <input type="date" name="startDate" id="startDate" value="<?php echo $startDate; ?>">
            </div>
            
            <div class="inputBox">
            <span>End Date :</span>
                <input type="date" name="endDate" id="endDate" value="<?php echo $endDate; ?>">
            </div>
            
            <div class="inputBox">
            <span>Image :</span>
                <input type="file" name="image">
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
<script  src="../js/script.js"></script>
<script>
    let packageForm = document.getElementById("add-package");
    packageForm.cost.addEventListener("change", function() {
        if (packageForm.cost.value < 0) {
            packageForm.cost.value = 0;
        }
    });

    packageForm.duration.addEventListener("change", function() {
        if (packageForm.duration.value < 0) {
            packageForm.duration.value = 0;
        }
        updateEndDate();
    });

    packageForm.startDate.addEventListener("change", function() {
        updateEndDate();
    });

    function updateEndDate() {
        let startDate = new Date(packageForm.startDate.value);
        let duration = parseInt(packageForm.duration.value);
        if (!isNaN(startDate.getTime()) && !isNaN(duration)) {
            let endDate = new Date(startDate);
            endDate.setDate(endDate.getDate() + duration);
            if (!isNaN(endDate.getTime())) {
                packageForm.endDate.value = formatDate(endDate);
            }
        }
    }

    function formatDate(date) {
        let year = date.getFullYear();
        let month = String(date.getMonth() + 1).padStart(2, "0");
        let day = String(date.getDate()).padStart(2, "0");
        return `${year}-${month}-${day}`;
    }
</script>
</body>
</html>
