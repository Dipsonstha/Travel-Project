<!-- add_itinerary.php -->
<?php
include "../config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $packageId = $_POST['package_id'];
    $dayNumber = $_POST['day_number'];
    $activityDescription = $_POST['activity_description'];

    // Perform necessary validations on the form data
    // (e.g., check for empty values, validate day_number, etc.)

    // Insert new itinerary entry into the database
    $insertSql = "INSERT INTO itinerary (package_id, day_number, activity_description)
                  VALUES ($packageId, $dayNumber, '$activityDescription')";

    if (mysqli_query($conn, $insertSql)) {
        // Successfully added the new itinerary entry
        // Redirect back to the itinerary.php page with a success message
        $_SESSION['success_message'] = "New itinerary entry added successfully.";
        header('Location: itinerary.php?package_id=' . $packageId);
        exit;
    } else {
        // Handle database error
        // Redirect back to the itinerary.php page with an error message
        $_SESSION['error_message'] = "Error adding itinerary entry. Please try again.";
        header('Location: itinerary.php?package_id=' . $packageId);
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
