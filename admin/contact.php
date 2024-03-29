<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Contact form</title>

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

<h1 class="heading-title">User Contacts</h1>

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
        <th>Message</th>
        </tr>
        <tbody>
        <?php
            include "../config.php";
            //read all row from database table;
            $sql = "SELECT * FROM `contact`";
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
              <td>$row[message]</td>
              <td>
              <a href='delete_contact.php?id=$row[id]' class='btn'>Delete</a>
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