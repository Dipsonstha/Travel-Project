<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

// Clear the form submitted flag if accessing the form again
$_SESSION['form_submitted'] = false;

$errorMessage = "";
$successMessage = "";

$id = $_GET['id'];

// Check if the user is logged in and retrieve their information
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking</title>
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
        <h1>Update Booking</h1>
    </div>
    <!-- Booking section starts -->
    <section class="booking">
        <h1 class="heading-title">Update your Booking</h1>
        <?php if (!empty($errorMessage)) { ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <?php if (!empty($successMessage)) { ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php } 
        $sql_update = "SELECT * FROM book_form WHERE id = '$id'";
        $result_update= mysqli_query($connection,$sql_update);
        $row_update = $result_update->fetch_assoc();
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="booking-form" id="booking-form">
            <div class="flex">
                <div class="inputBox">
                    <span>Name:</span>
                    <input type="text" name="name" value="<?php echo $_SESSION['user_name']; ?>" disabled>
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" placeholder="Enter your email" name="email" value="<?php echo $_SESSION['user_email']?>" disabled>
                </div>
                <div class="inputBox">
                    <span>Phone:</span>
                    <input type="text" placeholder="<?php echo $row_update['phone']  ?>" name="phone" maxlength="10" >
                </div>
                <div class="inputBox">
                    <span>Address:</span> 
                    <input type="text" placeholder="<?php echo $row_update['address']  ?>" name="address">
                </div>
                <div class="inputBox">
                    <span>Where to:</span>
                    <select name="" id="">
                        <?php 
                        $sql_destination = "SELECT * FROM package";
                        $result_destination = mysqli_query($connection,$sql_destination);
                        while($row_destination = $result_destination->fetch_assoc() )
                        {
                        ?>
                        <option value="<?php echo $row_destination['PackageName'] ?>"><?php echo $row_destination['PackageName'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="inputBox">
                    <span>How many:</span>
                    <input type="number" placeholder="Enter number of people" name="guests">
                </div>
                <!-- Calculate total cost and display it -->
                <div class="inputBox">
                 <span>Total Cost:</span>
                 <?php
                 if (isset($_GET['cost'])) {
                     $cost = $_GET['cost'];
                     echo '<input type="text" value="' . $cost . '" name="totalCost" id="totalCost" readonly>';
                 } else {
                     $cost = isset($_POST['totalCost']) ? $_POST['totalCost'] : "";
                     echo '<input type="text" value="' . $cost . '" name="totalCost" id="totalCost" readonly>';
                 }
                 ?>
                </div>

            </div>
            <input type="submit" value="Update" class="btn" name="send">
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
    <script>
        let bookingForm = document.getElementById("booking-form");
        bookingForm.guests.addEventListener("change", function () {
            if (bookingForm.guests.value < 0) {
                bookingForm.guests.value = 0;
            }
        });

        let totalCostInput = document.getElementById("totalCost");
        let costPerPerson = <?php echo isset($_GET['cost']) ? $_GET['cost'] : 0; ?>;

        bookingForm.guests.addEventListener("input", function () {
            let guests = parseInt(bookingForm.guests.value);
            if (guests < 0) {
                guests = 0;
            }
            let totalCost = guests * costPerPerson;
            totalCostInput.value = totalCost.toFixed(2);
        });

        
// Select the form element
var form = document.querySelector("form");

// Function to enable all disabled elements
function enableDisabledElements() {
  // Select all elements with the disabled attribute within the form
  var disabledElements = form.querySelectorAll("[disabled]");

  // Iterate over the disabled elements and remove the disabled attribute
  disabledElements.forEach(function(element) {
    element.removeAttribute("disabled");
  });
}

// Add an event listener to the form submission
form.addEventListener("submit", function(event) {
  enableDisabledElements();
});

    </script>
</body>

</html>
