<?php
session_start();
$user_name= $_SESSION['user_name'];
$id = $_SESSION['id'];
$conn = mysqli_connect("localhost","root","","book_db");
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
    }
    else{
        $sql = "SELECT * from signup_form WHERE id = $id ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
          
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        *{
            margin: 0;
            padding: 0;

        }
        .container{
            width: 100%;
            height: 100vh;
            background-color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php 
      echo "<h1>Welcome ".$row["name"]."! </h1>";
    ?>
    </div>
    
</body>
</html>