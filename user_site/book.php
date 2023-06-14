<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
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
    include 'header.php';
    ?>
<div class="heading" style="background:url(../image/slider3.jpg) no-repeat">
<h1>Book</h1>
</div>
<!-- Booking section starts -->
<section class="booking">

<h1 class="heading-title">Book your Trip!</h1>

<form action="book_form.php?submitted=true" method="post" class="booking-form" id="booking-form" >

<div class="flex">
    <div class="inputBox">
        <span>name :</span>
        <input type="text" placeholder="enter your name" name="name">
    </div>
    <div class="inputBox">
        <span>email :</span>
        <input type="email" placeholder="enter your email" name="email">
    </div>
    <div class="inputBox">
        <span>phone :</span>
        <input type="text" placeholder="enter your number" name="phone" max="10">
    
    </div>
    <div class="inputBox">
        <span>address :</span>
        <input type="text" placeholder="enter your address" name="address">
    
    </div>
    <div class="inputBox">
        <span>where to  :</span>
        <input type="text" placeholder="enter your destination" name="location">
    </div>

        <div class="inputBox">
        <span>How many  :</span>
        <input type="number" placeholder="enter number of people" name="guests">
    </div>
    
    <div class="inputBox">
        <span>Arrivals :</span>
        <input type="date" name="arrivals">
    </div>

    <div class="inputBox">
        <span>leaving :</span>
        <input type="date" name="leaving">
    </div>
</div>
<input type="submit" value="submit" class="btn" name="send">
</form>
</section>
<!-- Booking section ends   -->
<!-- Foter section   starts -->
 
    <?php
    include '../footer.php';
    ?>

       <!-- Footer section ends -->
    
    <!-- Swiper Js Link -->
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
    <!-- Custom Js Link -->
    
    <script src="../js/script.js"></script>
    <script>
        let bookingForm = document.getElementById("booking-form");
        bookingForm.guests.addEventListener("change",function(){
            if(bookingForm.guests.value < 0){
                bookingForm.guests.value = 0;
            }
        })
    </script>
    </body>
    </html>
