<?php
include 'config.php';

$error = array(); // Initialize the error array

if (isset($_POST['send'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM signup_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($password != $confirmPassword) {
            $error[] = 'Passwords do not match';
        } else {
            $insert = "INSERT INTO signup_form(name, email, password, user_type) VALUES('$name','$email','$password','$user_type')";
            mysqli_query($conn, $insert);

             // Store the user data in session for later use
             session_start();
             $_SESSION['name'] = $name;
             $_SESSION['email'] = $email;
 

            header('Location:home.php');
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Swiper Css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- Custom Css link -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
    <!-- Header Section starts -->
    <?php
    include 'header.php';
    ?>
    <!-- login form container -->
    <?php
    include 'login.php';
    ?>
    <!-- signup form started -->
    <div class="signup-form-container">
        <form action="" method="post" class="signup-form" name="myForm" onsubmit="return validateForm()">
            <h3>Signup</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
            }
            ?>
            <input type="text" name="name" class="box" placeholder="Name" id="fname" required><span class="formerror"
                id="error"></span>
            <input type="text" name="email" class="box" placeholder="Email" id="femail" required><span
                class="formerror" id="error1"></span>
            <input type="password" name="password" class="box" placeholder="Password" id="fpassword" required><span
                class="formerror" id="error2"></span>
            <input type="password" name="confirmPassword" class="box" placeholder="Confirm Password" id="fconfirmpass"
                required><span class="formerror" id="error3"></span>
            <select name="user_type" id="">
                <option value="user">user</option>
                <!-- <option value="admin">admin</option> -->
            </select>
            <input type="submit" class="btn" value="signup now" name="send" id="submit-btn">
        </form>
    </div>
    <!-- signup form ended -->
    <!-- Foter section   starts -->
    <?php
    include 'footer.php';
    ?>
    <!-- Footer section ends -->

    <!-- Swiper Js Link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        // Automatically fill the input boxes in the book form with user data
        window.onload = function() {
            var nameInput = document.querySelector('input[name="name"]');
            var emailInput = document.querySelector('input[name="email"]');
            var bookForm = document.getElementById('booking-form');

            // Check if the name and email session variables are set
            if ('<?php echo isset($_SESSION['name']); ?>' && '<?php echo isset($_SESSION['email']); ?>') {
                nameInput.value = '<?php echo $_SESSION['name']; ?>';
                emailInput.value = '<?php echo $_SESSION['email']; ?>';
            }

            // Clear the session variables after filling the input boxes
            <?php unset($_SESSION['name']); ?>
            <?php unset($_SESSION['email']); ?>

            // Submit the book form automatically after filling the input boxes
            bookForm.submit();
        };
    </script>

    <!-- Custom Js Link -->
    <script src="js/script.js"></script>
</body>

</html>
