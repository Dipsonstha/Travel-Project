<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
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

    <div class="box-container">
        <div class="box">   
        
    <div class="heading-title">
        
    <h3>hi,admin</h3>
            <h3>welcome</h3>
    </div>
    </div>
    </div>
 <script>
document.getElementById("login-btn").addEventListener("click",function(event){
   event.preventDefault();
   logoutMessage();
});

function logoutMessage(){
   Alert("Do you want to logout?");
}
</script>
    <!-- Custom Js Link -->

<script  src="../js/admin_script.js"></script>
 
</body>
</html>