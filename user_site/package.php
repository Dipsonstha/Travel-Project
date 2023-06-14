<?php
session_start();
$error = array(); // Initialize the error array
// print_r($_SESSION);

if (isset($_POST['send'])) {
    include '../config.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $select = "SELECT * FROM signup_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['password'] == $password) {
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                header('Location: dashboard.php');
                exit;
            } elseif ($row['user_type'] == 'user') {
                header('Location: user_dashboard.php');
                exit;
            }
        } else {
            $error[] = 'Incorrect password!';
        }
    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package</title>
    <!-- Swiper Css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- Custom Css link -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <!-- Header Section starts -->
    <?php
    include 'header.php';
    ?>
    <!-- Header section Ends -->

    <div class="heading" style="background:url(../image/package5.jpg) no-repeat">
        <h1>Package</h1>
    </div>

    <!-- Package section starts -->
    <section class="packages">
        <h1 class="heading-title">
            Top destinations
        </h1>
        <div class="box-container">
            <?php
            include("../config.php");
            $sql = "SELECT * FROM package";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $imageData = base64_encode($row['image']);
                echo '<div class="box">
                        <div class="image"><img src="data:image/jpeg;base64,' . $imageData . '" alt=""></div>
                        <div class="content">
                            <h3>' . $row["PackageName"] . '</h3>
                            <p>' . $row["PackageType"] . '</p>
                            <p class="tour-details">Cost: NRS ' . $row["cost"] . ' per person | Duration: ' . $row["duration"] . ' days | Start: ' . $row["startDate"] . ' | End: ' . $row["endDate"] . '</p>
                            <a href="book.php?packageid=' . $row["id"] . '" class="btn">Book Now</a>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </section>
    <!-- Package section ends -->

    <section class="package_description">
        <h2 class="heading-title">Package Description</h2>
        <h3>Inclusive</h3>
        <ul>
            <li>Accommodation in hotel/homestay.</li>
            <li>Transportation on road</li>
            <li>Guided tours</li>
            <li>Meals (breakfast, lunch, and dinner)</li>
            <li>Entrance fees to tourist sites</li>
            <li>24/7 customer support</li>
        </ul>
        <h3>Exclusive</h3>
        <ul>
            <li>Flight tickets</li>
            <li>Personal expenses</li>
            <li>Travel insurance</li>
            <li>Additional activities not mentioned in the itinerary</li>
        </ul>
    </section>

    <!-- Footer section starts -->
    <?php
    include '../footer.php';
    ?>

    <!-- Footer section ends -->

    <script src="../js/script.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".box-container", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
</body>
</html>
