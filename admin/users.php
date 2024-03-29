<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Users List</title>

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

<h1 class="heading-title">Users List</h1>

<!-- <a href="create.php" class="btn" role="button">Add packages</a> -->
<br>
<table class="table">
    <thead> 
        <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>Email</th>
        </tr>
        <tbody>
        <?php
            include "../config.php";
            //read all row from database table;
            $sql = "SELECT * FROM signup_form WHERE hidden = 0 ";
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
              <td>
              <a href='delete_user.php?id=$row[id]' class='btn'>Delete</a>
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

 <!-- Custom Js Link -->

 <script  src="../js/admin_script.js"></script>
</body>
</html>