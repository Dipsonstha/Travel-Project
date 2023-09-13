<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

// Clear the form submitted flag if accessing the form again
$_SESSION['form_submitted'] = false;

$errorMessage = "";
$successMessage = "";

$id = $_GET['id'];

if (isset($_POST['send'])) { // Check for form submission
    // Retrieve form data
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $guests = $_POST['guests'];
    $location = $_POST['location'];

    // Perform form validation
    $validationErrors = [];

    if (empty($phone) || !preg_match("/^[0-9]{10}$/", $phone)) {
        $validationErrors[] = "Valid 10-digit phone number is required.";
    }

    if (empty($address)) {
        $validationErrors[] = "Address field is required.";
    }

    if (!is_numeric($guests) || $guests < 0) {
        $validationErrors[] = "Number of guests must be a non-negative integer.";
    }

    // Other validation rules for location can be added here

    if (empty($validationErrors)) {
        // No validation errors, proceed with database update

        // Use prepared statement to prevent SQL injection
        $sql_update = "UPDATE book_form SET phone=?, address=?, guests=?, location=? WHERE id=?";

        // Prepare and bind the statement
        $stmt = mysqli_prepare($connection, $sql_update);
        mysqli_stmt_bind_param($stmt, "ssisi", $phone, $address, $guests, $location, $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Show success message
            $successMessage = 'Booking details updated successfully!';
        } else {
            // Show error message
            $errorMessage = "Error updating data: " . mysqli_error($connection);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Validation errors found, set error message
        $errorMessage = implode("<br>", $validationErrors);
    }
}

// Fetch data for pre-populating the form
$sql_fetch_booking = "SELECT * FROM book_form WHERE id = '$id'";
$result_fetch_booking = mysqli_query($connection, $sql_fetch_booking);
$row_fetch_booking = $result_fetch_booking->fetch_assoc();

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
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post" class="booking-form"
            id="booking-form">
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
                    <input type="text" placeholder="<?php echo $row_fetch_booking['phone']  ?>" name="phone" maxlength="10" value="<?php echo $row_fetch_booking['phone']; ?>">
                </div>
                <div class="inputBox">
                    <span>Address:</span> 
                    <input type="text" placeholder="<?php echo $row_fetch_booking['address']  ?>" name="address" value="<?php echo $row_fetch_booking['address']; ?>">
                </div>
                <div class="inputBox">
                    <span>Where to:</span>
                    <select name="location" id="locationSelect">
                    <?php 
                    $sql_destination = "SELECT * FROM package";
                    $result_destination = mysqli_query($connection, $sql_destination);
                    while($row_destination = $result_destination->fetch_assoc()) {
                    $selected = ($row_fetch_booking['location'] == $row_destination['PackageName']) ? 'selected' : '';
                    echo '<option value="' . $row_destination['PackageName'] . '" data-cost="' . $row_destination['Cost'] . '" ' . $selected . '>' . $row_destination['PackageName'] . '</option>';
                    }
        ?>
    </select>
                </div>
                <div class="inputBox">
                    <span>How many:</span>
                    <input type="number" placeholder="Enter number of people" name="guests" value="<?php echo $row_fetch_booking['guests']; ?>">
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
            <a href="my_book.php" role="button" class="btn">Back</a>

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
       document.addEventListener("DOMContentLoaded", function() {
        let locationSelect = document.getElementById("locationSelect");
        let totalCostInput = document.getElementById("totalCost");
        let bookingForm = document.getElementById("booking-form");

        // Initialize costPerPerson with the initial cost
        let costPerPerson = parseFloat(locationSelect.options[locationSelect.selectedIndex].getAttribute("data-cost"));

        locationSelect.addEventListener("change", function() {
            costPerPerson = parseFloat(locationSelect.options[locationSelect.selectedIndex].getAttribute("data-cost"));
            updateTotalCost();
        });

        bookingForm.guests.addEventListener("input", function() {
            updateTotalCost();
        });

        function updateTotalCost() {
            let guests = parseInt(bookingForm.guests.value);
            if (isNaN(guests) || guests < 0) {
                guests = 0;
            }
            
            let totalCost = costPerPerson * guests;
            totalCostInput.value = totalCost.toFixed(2);
        }

        // Rest of your code...
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
