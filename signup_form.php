<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'book_db');
if (isset($_POST['send'])) {

    // Check if the form has already been submitted in the current session
    if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted']) {
        echo 'The Signup-form has already been submitted.';
        exit();
    }

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $phone = $_POST['phone'];

    // Perform form validation
    if (!empty($name) && !empty($email) && !empty($password) && !empty($confirmPassword) && !empty($phone)) {
        // All required fields have a value, proceed with database insertion

        // Escape special characters to prevent SQL injection
        $name = mysqli_real_escape_string($connection, $name);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        $confirmPassword = mysqli_real_escape_string($connection, $confirmPassword);
        $phone = mysqli_real_escape_string($connection, $phone);

        // Create the SQL query
        $request = "INSERT INTO signup_form (name, email, password, confirmPassword, phone) 
                    VALUES ('$name', '$email', '$password', '$confirmPassword', '$phone')";

        // Execute the query
        mysqli_query($connection, $request);

        // Set the form submitted flag in session
        $_SESSION['form_submitted'] = true;

        // Redirect to the signup.php page
        header('location: signup.php');
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
