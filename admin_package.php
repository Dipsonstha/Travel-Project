<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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
    <a href="home.php" class="logo"><span> Admin Pannel </span></a>
    
<nav class="navbar">
<a href="dashboard.php">Dashboard</a>
<a href="#">Packages</a>
<a href="#">Bookings</a>
</nav>
<div id="menu-btn" class="fas fa-bars"></div>
<div class="icons"> 
<a href="home.php"> <i class="fas fa-user" id="login-btn"></i></a>
</div>
</div>
</section>

<section class="booking">

<h1 class="heading-title">Travel Packages!</h1>

<a href="create.php" class="btn" role="button">Add packages</a>
<br>
<table class="table">
    <thead> 
        <tr>
        <th>ID</th>
        <th>Package Name</th>
        <th>Package Type</th>
        <th>Cost</th>
        <th>Duration</th>
        <th>Start Date</th>
        <th>End Date</th>
        </tr>
        <tbody>
            <?php
            include "config.php";
            //read all row from database table;
            $sql = "SELECT * FROM `package`";
            $result = $conn->query($sql);

            if(!$result){
            die("Invalid Query: " . $conn->error);
            }

            //read each data from row
            while($row = $result->fetch_assoc()){
                echo" 
                <tr>
                <td>$row[id]</td>
                <td>$row[PackageName]</td>
                <td>$row[PackageType]</td>
                <td>$row[cost]</td>
                <td>$row[duration]</td>
                <td>$row[startDate]</td>
                <td>$row[endDate]</td>
                <td>
                    <a href='update.php?id=$row[id]' class='btn'>Edit</a>
                    <a href='delete.php?id=$row[id]' class='btn'>Delete</a>
                </td>
                </tr>
                     ";
            }


            ?>  
        </tbody>

    </thead>
</table>
</section>
   <!-- Custom Js Link -->

   <script  src="js/admin_script.js"></script>
 
</body>
</html>