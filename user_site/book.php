<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

// Clear the form submitted flag if accessing the form again
$_SESSION['form_submitted'] = false;

$errorMessage = "";
$successMessage = "";

$location_det = ""; // Default value

if(isset($_GET["location"])){
    $location_det = $_GET["location"];
} else {
    header("Location: package.php"); // Redirect if location is not set
    exit();
}

if (isset($_POST['send'])) { // Check for form submission
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $cost = $_POST['totalCost'];
    
    // Perform form validation
    $validationErrors = [];

    if (empty($name)) {
        $validationErrors[] = "Name field is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validationErrors[] = "Valid email address is required.";
    }

    if (empty($phone) || !preg_match("/^[0-9]{10}$/", $phone)) {
        $validationErrors[] = "Valid 10-digit phone number is required.";
    }

    if (empty($address)) {
        $validationErrors[] = "Address field is required.";
    }

    if (empty($location)) {
        $validationErrors[] = "Location field is required.";
    }

    if (!is_numeric($guests) || $guests < 0) {
        $validationErrors[] = "Number of guests must be a non-negative integer.";
    }

    // Other validation rules for cost and payment can be added here

   // Retrieve user_id from the session
$user_id = $_SESSION['id'];


// ...

if (empty($validationErrors)) {
    // No validation errors, proceed with database insertion

    // Use prepared statement to prevent SQL injection
    $sql_insert = "INSERT INTO book_form (user_id, name, email, phone, address, location, guests, cost) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind the statement
    $stmt = mysqli_prepare($connection, $sql_insert);
    mysqli_stmt_bind_param($stmt, "issssssd", $user_id, $name, $email, $phone, $address, $location, $guests, $cost);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Set the form submitted flag in session
            $_SESSION['form_submitted'] = true;

            // Show success message
            $successMessage = 'Package successfully booked! Pay after the service';
        } else {
            // Show error message
            $errorMessage = "Error inserting data: " . mysqli_error($connection);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Validation errors found, set error message
        $errorMessage = implode("<br>", $validationErrors);
    }
}

// Rest of your code...

// Fetch data from database
$sql_fetch_data = "SELECT * FROM package WHERE PackageName = '$location_det'";
$result_fetch_data = mysqli_query($connection, $sql_fetch_data);
$row_fetch_data = $result_fetch_data->fetch_assoc();

?> 

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
        <h1>Book</h1>
    </div>
    <!-- fetch data from database -->
    <?php
     
    $sql_fetch_data = "SELECT * FROM package WHERE PackageName = '$location_det'";
    $result_fetch_data = mysqli_query($connection,$sql_fetch_data);
    $row_fetch_data = $result_fetch_data->fetch_assoc();
    
    
    ?>  
    <!-- Booking section starts -->
    <section class="booking">
        <h1 class="heading-title">Book your Trip! <?php  echo $_GET["location"] ?></h1>
         <?php if (!empty($errorMessage)) { ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <?php if (!empty($successMessage)) { ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php } ?>
        <form method="post" class="booking-form" id="booking-form">
    <div class="flex">
        <div class="inputBox">
            <span>name :</span>
            <input type="text" placeholder="enter your name" name="name" value="<?php echo $_SESSION['user_name'] ?>" disabled>
        </div>
        <div class="inputBox">
            <span>email :</span>
            <input type="email" placeholder="enter your email" name="email" value="<?php echo $_SESSION['user_email']?>" disabled>
        </div>
        <div class="inputBox">
            <span>phone :</span>
            <input type="text" placeholder="enter your number" name="phone" maxlength="10">
        </div>
        <div class="inputBox">
            <span>address :</span>
            <input type="text" placeholder="enter your address" name="address">
        </div>
        <div class="inputBox">
            <span>where to :</span>
            <input type="text" placeholder="enter your destination" name="location" value="<?php echo isset($_GET['location']) ? urldecode($_GET['location']) : ''; ?>" disabled>
        </div>
        <div class="inputBox">
            <span>How many :</span>
            <input type="number" placeholder="enter number of people" name="guests">
        </div>
        <!-- Calculate total cost and display it -->
        <div class="inputBox">
            <span>Total Cost:</span>
            <?php
            if (isset($_GET['cost'])) {
                $cost = $_GET['cost'];
                echo '<input type="text" value="" name="totalCost" id="totalCost" readonly>';
            }
            ?>
        </div>
    </div>
    <input type="submit" value="submit" class="btn" name="send">
    <a href="package.php" role="button" class="btn">Back</a>
</form>


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
        let costPerPerson = <?php echo isset($row_fetch_data['cost']) ? $row_fetch_data['cost'] : 0; ?>;

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
