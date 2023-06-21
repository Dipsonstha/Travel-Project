<?php
include '../config.php';

$packageName = "";
$packageType = "";
$cost = "";
$duration = "";
$startDate = "";
$endDate = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POST method: update the package data
    $id = $_POST["id"];
    $packageName = $_POST["packageName"];
    $packageType = $_POST["packageType"];
    $cost = $_POST["cost"];
    $duration = $_POST["duration"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // Validate the input
    if (empty($packageName) || empty($packageType) || empty($cost) || empty($duration) || empty($startDate) || empty($endDate)) {
        $errorMessage = "All fields are required.";
    } else {
        // Update the package in the database
        $sql = "UPDATE `package` SET `PackageName`='$packageName',`PackageType`='$packageType',`cost`='$cost',`duration`='$duration',`startDate`='$startDate',`endDate`='$endDate' WHERE id = $id";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
        } else {
            $successMessage = "Package updated successfully.";
            echo '<script>
            setTimeout(function() {
                window.location.href = "admin_package.php";
            }, 3000);
        </script>';    
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GET method: show the package data
    if (!isset($_GET["id"])) {
        header("location:admin_package.php");
        exit;
    }

    $id = $_GET["id"];

    // Retrieve the selected package from the database
    $sql = "SELECT * FROM `package` WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:admin_package.php");
        exit;
    }

    $packageName = $row["PackageName"];
    $packageType = $row["PackageType"];
    $cost = $row["cost"];
    $duration = $row["duration"];
    $startDate = $row["startDate"];
    $endDate = $row["endDate"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Package</title>
    
    <!-- Swiper Css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"> 

    <!-- Custom CSS link -->
    <link rel="stylesheet" href="../css/admin_style.css">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php
    include 'header.php';   
    ?>
    <div class="add-products">
        <h1 class="heading-title">Update Package</h1>
        <?php if (!empty($errorMessage)): ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
    <?php if (!empty($successMessage)): ?>
        <div class="success-message"><?php echo $successMessage; ?></div>
    <?php endif; ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
        <?php if (!empty($errorMessage)): ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <?php if (!empty($successMessage)): ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php endif; ?>
    </div>

    <!-- Swiper Js Link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> 

    <!-- Custom Js Link -->
    <script src="../js/script.js"></script>
    <script>
    let packageForm = document.querySelector("form");
    packageForm.addEventListener("input", updateEndDate);

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
