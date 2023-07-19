<!-- itinerary.php -->
<!DOCTYPE html>
<html lang="en">
<head>
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
  

    <?php
    include "../config.php";
    // Retrieve the package ID from the query parameter
    if (isset($_GET['package_id'])) {
        $packageId = $_GET['package_id'];

        // Fetch package details from the database based on the package ID
        $packageSql = "SELECT * FROM package WHERE id = $packageId";
        $packageResult = $conn->query($packageSql);
        $packageRow = $packageResult->fetch_assoc();

        // Check if the package exists
        if (!$packageRow) {
            echo "Package not found.";
            exit;
        }
          // Store the package name in the $packageName variable
       $packageName = $packageRow['PackageName'];
    } else {
        echo "Package ID not provided.";
        exit;
    }
    ?>

     <!-- Add new itinerary entry form -->
   <section class="add-itinerary">
      <h3 class="heading-title">Add New Itinerary Entry For <?php echo $packageName ?></h3>
      <form action="add_itinerary.php" method="post">
      <div class="flex">    
      <div class="inputBox">
                <!-- Include a hidden field for package_id to associate the itinerary entry with the correct package -->
                <input type="hidden" name="package_id" value="<?php echo $packageId; ?>">
            
            <span>Day Number :</span>
            <input type="number" name="day_number" id="day_number" required>
            </div>
            <div class="inputBox">
            <span>Activity Description :</span>
            <textarea name="activity_description" id="activity_description" required></textarea>
            </div>
            <div class="inputBox">
            <span>Additional details :</span>
            <textarea name="activity_description" id="activity_description" required></textarea>
            </div>
            </div>

         <button type="submit" class="btn">Add New Entry</button>
         <a href="admin_package.php" role="button" class="btn">Back</a>
      </form>
   </section>


    <!-- ... (Your footer section and scripts) -->
    <!-- Custom Js Link -->

   <script  src="../js/admin_script.js"></script>
</body>
</html>
