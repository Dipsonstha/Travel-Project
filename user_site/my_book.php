<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
      //session start
      session_start();
      $user_name=$_SESSION['user_name'];
      $id = $_SESSION['id'];
    include 'header.php';
    ?>
    <!-- Header section Ends -->
    <section class="booking">

<h1 class="heading-title">My package Booking!<?php  echo $id .$user_name ?> </h1>
<br>
<table class="table">
    <thead> 
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Destinaton</th>
        <th>Number of people</th>
        <th>Total Cost</th>
        </tr>
        <tbody>
            <?php
            include "../config.php";
            //read all row from database table;

            $sql = "SELECT * FROM `book_form` where  id= $id";
            $result = $conn->query($sql);
            $idnum=1;
            if(!$result){
            die("Invalid Query: " . $conn->error);
            }

            //read each data from row
            while($row = $result->fetch_assoc()){
                echo" 
                <tr>
              <td>$idnum</td>
              <td>$row[name]</td>
              <td>$row[email]</td>
              <td>$row[phone]</td>
              <td>$row[address]</td>
              <td>$row[location]</td>
              <td>$row[guests]</td>
              <td>$row[cost]</td>
              <td>
              <a href='update.php?id=$row[id]' class='btn'>Edit</a>
              <a href='delete.php?id=$row[id]' class='btn'>Delete</a>
              </td>
              </tr>
              ";
              $idnum++;
            }


            ?>  
        </tbody>

    </thead>
</table>
</section>








    <!-- Footer Section Starts -->
    <?php
    include 'footer.php';
    ?>
    <!-- Footer Section Ends-->
    <script src="../js/script.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>