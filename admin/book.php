<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book form</title>

    <!-- Swiper Css link -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"> 


    <!-- Custom CSS link -->
    <link rel="stylesheet" href="../css/admin_style.css">

     <!-- Font awsome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
      <!-- header section -->
    <?php
    include 'header.php';
    ?>
    <section class="booking">

<h1 class="heading-title">Package Bookings </h1>

<!-- <a href="create.php" class="btn" role="button">Add packages</a> -->
<br>
<table class="table">
    <thead> 
        <tr>
        <th>ID</th>
        <th>Customers Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Number of people</th>
        <th>Package Name</th>
        <th>Package Type</th>
        <th>Cost</th>
        <th>Duration</th>
        <th>Start Date</th>
        <th>End Date</th>
        </tr>
        <tbody>
        </tbody>

    </thead>
</table>
</section>

 <!-- Custom Js Link -->

 <script  src="../js/admin_script.js"></script>
</body>
</html>