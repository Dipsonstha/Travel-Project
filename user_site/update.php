<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

$errorMessage = "";
$successMessage = "";

$book_form_id = $_GET['id'] ?? ''; // Assuming this is the ID from book_form table
$package_name = $_GET['PackageName'] ?? ''; // Assuming this is the ID from package table

echo "$package_name";
$Guests = isset($_POST['guests']) ? $_POST['guests'] : 0;

$Cost = 0; // Default value

// Fetch the cost from the package table based on the selected id
if (!empty($package_id)) {
    $sql_fetch_cost = "SELECT cost FROM package WHERE PackageName = ?";
    $stmt = mysqli_prepare($connection, $sql_fetch_cost);
    mysqli_stmt_bind_param($stmt, "i", $package_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $Cost);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}
// Fetch the cost from the package table based on the location
$sql_fetch_cost = "SELECT package.cost
                  FROM book_form
                  JOIN package ON book_form.location = package.PackageName
                  WHERE book_form.id = ?";
$stmt = mysqli_prepare($connection, $sql_fetch_cost);
mysqli_stmt_bind_param($stmt, "i", $book_form_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $Cost);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// // Fetch the cost from the database
// $sql_fetch_data = "SELECT * FROM book_form WHERE id = '$book_form_id'";
// $result_fetch_data = mysqli_query($connection, $sql_fetch_data);
// $row_fetch_data = $result_fetch_data->fetch_assoc();

if(isset($row_fetch_data['cost'])){
    $Cost = $row_fetch_data['cost'];
}

if (isset($_POST['send'])) {
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $validationErrors = [];

    if (empty($phone) || !preg_match("/^[0-9]{10}$/", $phone)) {
        $validationErrors[] = "Valid 10-digit phone number is required.";
    }

    if (empty($address)) {
        $validationErrors[] = "Address field is required.";
    }

    if (!is_numeric($Guests) || $Guests < 0) {
        $validationErrors[] = "Number of guests must be a non-negative integer.";
    }

    if (empty($validationErrors)) {
        $sql_update = "UPDATE book_form SET phone=?, address=?, guests=? WHERE id=?";
        $stmt = mysqli_prepare($connection, $sql_update);
        mysqli_stmt_bind_param($stmt, "ssii", $phone, $address, $Guests, $book_form_id);

        if (mysqli_stmt_execute($stmt)) {
            // Calculate total cost
            $totalCost = $Guests * $Cost;

            // Update the total cost in the database
            $sql_update_cost = "UPDATE book_form SET cost=? WHERE id=?";
            $stmt_cost = mysqli_prepare($connection, $sql_update_cost);
            mysqli_stmt_bind_param($stmt_cost, "di", $totalCost, $book_form_id);
            mysqli_stmt_execute($stmt_cost);
            mysqli_stmt_close($stmt_cost);

            $successMessage = 'Booking details updated successfully!';
        } else {
            $errorMessage = "Error updating data: " . mysqli_error($connection);
        }

        mysqli_stmt_close($stmt);
    } else {
        $errorMessage = implode("<br>", $validationErrors);
    }
}

$location = "";
$sql_fetch_booking = "SELECT * FROM book_form WHERE id = '$book_form_id'";
$result_fetch_booking = mysqli_query($connection, $sql_fetch_booking);
$row_fetch_booking = $result_fetch_booking->fetch_assoc();

if(isset($row_fetch_booking['location'])){
    $location = $row_fetch_booking['location'];
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
        <h1><?php echo $row_fetch_booking['location']; ?></h1>
    </div>
    <!-- Booking section starts -->
    <section class="booking">
        <h1 class="heading-title">Update Booking of <?php echo $row_fetch_booking['location']; ?></h1>
        <?php if (!empty($errorMessage)) { ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <?php if (!empty($successMessage)) { ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php } ?>
        <form action="" method="post" class="booking-form" id="booking-form">
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
                    <input type="text" placeholder="Enter your phone number" name="phone" maxlength="10" >
                </div>
                <div class="inputBox">
                    <span>Address:</span> 
                    <input type="text" placeholder="Enter your address" name="address" >
                </div>
                <div class="inputBox">
                    <span>Where to:</span>
                    <input type="text" name="location" value="<?php echo $row_fetch_booking['location']; ?>" readonly>
                </div>
                <div class="inputBox">
                    <span>How many:</span>
                    <input type="number" placeholder="Enter number of people" name="guests" value="<?php echo $Guests; ?>">
                </div>
                <div class="inputBox">
    <span>Total Cost:</span>
    <input type="text" value="<?php echo $Guests * $Cost; ?>" name="totalCost" id="totalCost">
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
        // let bookingForm = document.getElementById("booking-form");

        // bookingForm.guests.addEventListener("change", function () {
        //     if (bookingForm.guests.value < 0) {
        //         bookingForm.guests.value = 0;
        //     }
        // });

        // let totalCostInput = document.getElementById("totalCost");
        // let costPerPerson = <?php echo $Cost; ?>;

        // bookingForm.guests.addEventListener("input", function () {
        //     let guests = parseInt(bookingForm.guests.value);
        //     if (guests < 0) {
        //         guests = 0;
        //     }
        //     let totalCost = guests * costPerPerson;
        //     totalCostInput.value = totalCost.toFixed(2);
        // });

        let bookingForm = document.getElementById("booking-form");

bookingForm.guests.addEventListener("change", function () {
    if (bookingForm.guests.value < 0) {
        bookingForm.guests.value = 0;
    }

    updateTotalCost();
});

function updateTotalCost() {
    let guests = parseInt(bookingForm.guests.value);
    if (guests < 0) {
        guests = 0;
    }

    let totalCost = guests * costPerPerson;
    document.getElementById("totalCost").value = totalCost.toFixed(2);
}

let totalCostInput = document.getElementById("totalCost");
let costPerPerson = <?php echo $Cost; ?>;

bookingForm.guests.addEventListener("input", updateTotalCost);


    </script>
</body>

</html>
