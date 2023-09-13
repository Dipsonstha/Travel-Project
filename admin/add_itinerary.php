<!-- add_itinerary.php -->
<?php
include "../config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $packageId = $_POST['package_id'];
    $dayNumber = $_POST['day_number'];
    $activityDescription = $_POST['activity_description'];

    // Prepare the SQL statement with placeholders
    $insertSql = "INSERT INTO itinerary (package_id, day_number, activity_description)
                  VALUES (?, ?, ?)";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $insertSql)) {
        // Bind the parameters to the statement
        mysqli_stmt_bind_param($stmt, "iis", $packageId, $dayNumber, $activityDescription);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Successfully added the new itinerary entry
            $_SESSION['success_message'] = "New itinerary entry added successfully.";
            header('Location: itinerary.php?package_id=' . $packageId);
            exit;
        } else {
            // Handle database error
            $_SESSION['error_message'] = "Error adding itinerary entry. Please try again.";
            header('Location: itinerary.php?package_id=' . $packageId);
            exit;
        }
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid request.";
    exit;
}
?>
