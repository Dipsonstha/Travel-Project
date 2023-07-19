

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
    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
    <!-- Header Section starts -->
    <?php include 'header.php'; ?>
    <div class="heading" style="background:url(../image/slider3.jpg) no-repeat">
        <h1>Contact Us</h1>
    </div>
    <!-- Booking section starts -->
    <section class="contact">
        <h1 class="heading-title">Contact Form</h1>
        <form action="" method="post" class="contact-form" id="contact-form">
            <div class="flex">
                <div class="inputBox">
                    <span>Name:</span>
                    <input type="text" name="name" placeholder="Enter your name" value="">
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" placeholder="Enter your email" name="email" value="" >
                </div>
                <div class="inputBox">
                    <span>Phone:</span>
                    <input type="text" placeholder="Enter your number" name="phone" maxlength="10">
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" placeholder="Enter your address" name="address">
                </div>
          
                <div class="inputBox">
                    <span>Message</span>
                    <textarea placeholder="Enter your message" name="comment"></textarea>
                </div>

          
            </div>
            <input type="submit" value="Submit" class="btn" name="send">
        </form>
    </section>
    <!-- Booking section ends -->
    <!-- Footer section starts -->
    <?php include 'footer.php'; ?>
    <!-- Footer section ends -->
    <!-- Swiper Js Link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Custom Js Link -->
    <script src="../js/script.js"></script>
</body>

</html>
