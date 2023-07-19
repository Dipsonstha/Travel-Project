<?php
include '../config.php'; // Update the path to the config.php file
session_start();
// Fetch all packages from the database
$sql = "SELECT * FROM package";
$result = mysqli_query($conn, $sql);

// Create an empty array to store package details
$packages = array();

while ($row = mysqli_fetch_assoc($result)) {
    // Add the package details to the $packages array
    $packages[] = $row;
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
            <?php foreach ($packages as $package): ?>
                <div class="box">
                    <a href="package_details.php?package_id=<?php echo $package['id']; ?>">
                        <div class="image">
                            <?php
                            $imageData = base64_encode($package['image']);
                            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="">';
                            ?>
                        </div>
                        <div class="content">
                            <h3><?php echo $package["PackageName"]; ?></h3>
                            <p><?php echo $package["PackageType"]; ?></p>
                            <p class="tour-details">Cost: NRS <?php echo $package["cost"]; ?> per person | Duration: <?php echo $package["duration"]; ?> days | Start: <?php echo $package["startDate"]; ?> | End: <?php echo $package["endDate"]; ?></p>

                            <?php
                            // Get the current date
                            $currentDate = date("Y-m-d");

                            // Calculate the maximum booking date
                            $maxBookingDate = date('Y-m-d', strtotime('+2 days', strtotime($package["startDate"])));

                            // Compare the current date with the maximum booking date
                            if ($currentDate < $maxBookingDate) {
                                // Booking is allowed
                                echo '<a href="book.php?location=' . urlencode($package['PackageName']) . '&cost=' . $package['cost'] . '" class="btn">Book Now</a>';
                            } else {
                                // Booking is not allowed
                                echo '<p class="error-message">Booking for this package is closed. Please select another package.</p>';
                            }
                            ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
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
    include 'footer.php';
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
