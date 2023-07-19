<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

// Clear the form submitted flag if accessing the form again
$_SESSION['form_submitted'] = false;

$errorMessage = "";
$successMessage = "";

// Check if the user is logged in and retrieve their information
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $name = $user['name'];
    $email = $user['email'];
} else {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
}

if (isset($_POST['send'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];

    // Check if the cost value is present in the form input
    if (empty($cost) && isset($_GET['cost'])) {
        $cost = $_GET['cost'];
    }

    // Perform form validation
    if (!empty($phone) && !empty($address) && !empty($guests)) {
        // All required fields have a value, proceed with database update

        // Escape special characters to prevent SQL injection
        $phone = mysqli_real_escape_string($connection, $phone);
        $address = mysqli_real_escape_string($connection, $address);
        $guests = mysqli_real_escape_string($connection, $guests);

        // Check if a user with the same email and phone number has already booked
        $existingQuery = "SELECT * FROM book_form WHERE email = '$email' AND phone = '$phone'";
        $existingResult = mysqli_query($connection, $existingQuery);

        if (mysqli_num_rows($existingResult) > 0) {
            // $errorMessage = 'A user with the same email and phone number has already booked the package. Please try a different phone number and email.';
        } else {
            $user_id = $_SESSION['id'];
            // Create the SQL query
            $request = "INSERT INTO book_form (name, email, phone, address, location, guests, cost,user_id) 
                        VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$cost','$user_id')";

            // Execute the query
            mysqli_query($connection, $request);

            // Set the form submitted flag in session
            $_SESSION['form_submitted'] = true;

            // Show success message
            $successMessage = 'Package successfully booked!';
        }
    } else {
        // Some required fields are empty, display an error message
        $errorMessage = 'Please fill in all required fields.';
    }
}
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
                    <input type="text" placeholder="Enter your number" name="phone" maxlength="10">
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" placeholder="Enter your address" name="address">
                </div>
                <div class="inputBox">
                    <span>Where to:</span>
                    <input type="text" placeholder="Enter your destination" name="location"
                        value="<?php echo isset($_GET['location']) ? urldecode($_GET['location']) : ''; ?>" >
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
