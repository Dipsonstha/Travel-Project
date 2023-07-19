<!-- package-details.php -->
<?php
include '../config.php'; // Update the path to the config.php file
session_start();

// Retrieve the package ID from the query parameter
$id = $_GET['package_id'];

// Query the database to fetch the package details
$sql = "SELECT * FROM package WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if the package exists
if (!$row) {
    echo "Package not found";
    exit;
}

// Retrieve the package details from the row
$packageName = $row['PackageName'];
// Retrieve other package details as needed

// Fetch the itinerary from the database for the specific package
$itinerarySql = "SELECT * FROM itinerary WHERE package_id = $id ORDER BY day_number ASC";
$itineraryResult = mysqli_query($conn, $itinerarySql);
$itineraryRows = mysqli_fetch_all($itineraryResult, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $packageName; ?> - Package Details</title>
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
        <h1><?php echo $packageName; ?></h1>
    </div>

    <!-- Display the package details -->
    <section class="package-details">
         <h2 class="heading-title">Itinerary</h2>
        <?php if ($itineraryRows): ?>
            <ul>
                <?php foreach ($itineraryRows as $row): ?>
                    <li>Day-<?php echo "{$row['day_number']}: {$row['activity_description']}"; ?><li><?php echo "{$row['additional_details']}" ;?></li> </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No itinerary found for this package.</p>
        <?php endif; ?>
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
