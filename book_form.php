<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'book_db');
if (isset($_POST['send'])) {

    // Check if the form has already been submitted in the current session
    if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted']) {
        echo 'The form has already been submitted.';
        exit();
    }

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

        // Create the SQL query
        $request = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving) 
                    VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";

        // Execute the query
        mysqli_query($connection, $request);

        // Set the form submitted flag in session
        $_SESSION['form_submitted'] = true;

        // Redirect to the book.php page
        header('location: book.php');
        exit();
    } else {
        // Some required fields are empty, display an error message
        echo 'Please fill in all required fields.';
    }
} else {
    // Clear the form submitted flag if accessing the form again
    $_SESSION['form_submitted'] = false;
    echo 'Something went wrong. Please try again.';
}

?>
