<?php
session_start();

$user_name = $_SESSION['user_name'];

if (!isset($_SESSION['user_name'])) {
    header('location:../home.php');
    exit(); // Add exit to stop further execution
}

$user_name = $_SESSION['user_name'];
$id = $_SESSION['id'];
$conn = mysqli_connect("localhost", "root", "", "book_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    // Validate password and confirm password
    if ($new_password !== $confirm_password) {
        $error = "Password and Confirm Password do not match.";
    } else {
        // Check if the email is already in use by other users
        $sql_check_email = "SELECT id FROM signup_form WHERE email = ? AND id != ?";
        $stmt_check_email = mysqli_prepare($conn, $sql_check_email);

        if ($stmt_check_email) {
            mysqli_stmt_bind_param($stmt_check_email, "si", $new_email, $id);
            mysqli_stmt_execute($stmt_check_email);
            mysqli_stmt_store_result($stmt_check_email);

            if (mysqli_stmt_num_rows($stmt_check_email) > 0) {
                $error = "Email is already in use by another user.";
            } else {
                // Update user profile
                $sql = "UPDATE signup_form SET name = ?, email = ?, password = ? WHERE id = ?";
                $stmt = mysqli_prepare($conn, $sql);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sssi", $new_name, $new_email, $new_password, $id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);

                    // Redirect to profile page after successful update
                    header("location:userProfile.php");
                    exit();
                } else {
                    $error = "Error in the statement: " . mysqli_error($conn);
                }
            }

            mysqli_stmt_close($stmt_check_email);
        } else {
            $error = "Error in the statement: " . mysqli_error($conn);
        }
    }
}

// Fetch the user data to display
$sql_fetch_data = "SELECT name, email FROM signup_form WHERE id = ?";
$stmt_fetch_data = mysqli_prepare($conn, $sql_fetch_data);

if ($stmt_fetch_data) {
    mysqli_stmt_bind_param($stmt_fetch_data, "i", $id);
    mysqli_stmt_execute($stmt_fetch_data);
    mysqli_stmt_store_result($stmt_fetch_data);

    if (mysqli_stmt_num_rows($stmt_fetch_data) > 0) {
        mysqli_stmt_bind_result($stmt_fetch_data, $row_name, $row_email);
        mysqli_stmt_fetch($stmt_fetch_data);
    } else {
        die("Error fetching user data: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt_fetch_data);
} else {
    die("Error in the statement: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User Profile</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="profile-container"> 
        <h1 class="heading">User Profile</h1>
        <h3>Name: <span class="smallSize"><?php echo $row_name; ?></span></h3> 
        <h3>Email: <span class="smallSize"><?php echo $row_email; ?></span></h3>

        <!-- Display validation error if any -->
        <?php
        if (isset($error)) {
            echo '<span class="error-msg">' . $error . '</span>';
        }
        ?>

        <form action="" method="post" class="update-form">
            <h1 class="heading">Update Profile</h1>
            <input type="text" name="name" class="box" placeholder="New Name" required>
            <input type="email" name="email" class="box" placeholder="New Email" required>
            <input type="password" name="password" class="box" placeholder="New Password" required>
            <input type="password" name="confirmPassword" class="box" placeholder="Confirm New Password" required>
            <input type="submit" class="btn" value="Update Profile" name="update">
            <a href='userProfile.php' class='btn'>Back</a>
        </form>
    </div>
</body>
</html>
