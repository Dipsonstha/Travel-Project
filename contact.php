<?php
$errorMessage = "";
$successMessage = "";

// Check if the form has been submitted
if (isset($_POST['send'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $message = $_POST['comment'];

    // Include the database connection file
    include 'config.php';

    // Perform form validation (you can add more validation if needed)
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($address) && !empty($message)) {
        // All required fields have a value, proceed with database insertion

        // Escape special characters to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $phone = mysqli_real_escape_string($conn, $phone);
        $address = mysqli_real_escape_string($conn, $address);
        $message = mysqli_real_escape_string($conn, $message);

        // Create the SQL query to insert data into the contact table
        $sql = "INSERT INTO contact (name, email, phone, address, message) VALUES ('$name', '$email', '$phone', '$address', '$message')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Data successfully inserted
            $successMessage = "Your form has been submitted, we'll contact you soon";
            // You can also redirect the user to a success page if desired
            // header("Location: success_page.php");
            // exit;
        } else {
            // Error in query execution
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Some required fields are empty, display an error message
        $errorMessage = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <!-- Swiper Css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- Custom Css link -->
    <link rel="stylesheet" href="css/styles.css">
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
        <?php if (!empty($errorMessage)) { ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php } ?>
    <?php if (!empty($successMessage)) { ?>
        <div class="success-message"><?php echo $successMessage; ?></div>
    <?php } ?>
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
    <script src="js/script.js"></script>
</body>

</html>
