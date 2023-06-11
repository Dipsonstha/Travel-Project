<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

// Clear the form submitted flag if accessing the form again
$_SESSION['form_submitted'] = false;

if (isset($_POST['send'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    // Perform form validation
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($address) && !empty($location) && !empty($guests) && !empty($arrivals) && !empty($leaving)) {
        // All required fields have a value, proceed with database insertion

        // Escape special characters to prevent SQL injection
        $name = mysqli_real_escape_string($connection, $name);
        $email = mysqli_real_escape_string($connection, $email);
        $phone = mysqli_real_escape_string($connection, $phone);
        $address = mysqli_real_escape_string($connection, $address);
        $location = mysqli_real_escape_string($connection, $location);
        $guests = mysqli_real_escape_string($connection, $guests);
        $arrivals = mysqli_real_escape_string($connection, $arrivals);
        $leaving = mysqli_real_escape_string($connection, $leaving);

        // Check if a user with the same email and phone number has already booked
        $existingQuery = "SELECT * FROM book_form WHERE email = '$email' AND phone = '$phone'";
        $existingResult = mysqli_query($connection, $existingQuery);

        if (mysqli_num_rows($existingResult) > 0) {
            echo 'A user with the same email and phone number has already booked the package. Please try a different phone number and email.';
            exit();
        }

        // Create the SQL query
        $request = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving) 
                    VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";

        // Execute the query
        mysqli_query($connection, $request);

        // Set the form submitted flag in session
        $_SESSION['submitted'] = true;

        // Show success message
        echo 'Form successfully booked!';

        // Redirect to the book.php page
        header('location: book.php');
        exit();
    } else {
        // Some required fields are empty, display an error message
        echo 'Please fill in all required fields.';
    }
}
?>

