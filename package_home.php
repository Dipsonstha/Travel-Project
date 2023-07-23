<?php
 include 'redirect.php';
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
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <!-- Header Section starts -->
    <?php
    include 'header.php';
    ?>
   <!-- Header section Ends -->

    <!-- Login form container -->
   <?php
   include 'login.php';
   ?>
    <div class="heading" style="background:url(image/package5.jpg) no-repeat">
        <h1>Package</h1>
    </div>

    <!-- Package section starts -->
    <section class="packages">
        <h1 class="heading-title">
            Top destinations
        </h1>
        <div class="box-container">
            <?php
            include("config.php");
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
                            <a href="#?packageid=' . $row["id"] . '" class="btn">Book Now</a>
                        </div>
                    </div>';
            }
            ?>
        </div>
        <div id="load-more" class="btn" onclick="loadMorePackages()">Load more</div>
    </section>
    <!-- Package section ends -->

    <section class="package_description">
        <h1 class="heading-title">Package Description</h1>
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

    <script src="js/script.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // var swiper = new Swiper(".box-container", {
        //     effect: "coverflow",
        //     grabCursor: true,
        //     centeredSlides: true,
        //     slidesPerView: "auto",
        //     coverflowEffect: {
        //         rotate: 0,
        //         stretch: 0,
        //         depth: 100,
        //         modifier: 1,
        //         slideShadows: true,
        //     },
        //     pagination: {
        //         el: ".swiper-pagination",
        //     },
        // });
        
    let boxes = document.querySelectorAll('.packages .box-container .box');
    let visiblePackages = 3; // Number of initially visible packages

    function loadMorePackages() {
        const totalPackages = boxes.length;

        for (let i = visiblePackages; i < visiblePackages + 3; i++) {
            if (boxes[i]) {
                boxes[i].style.display = 'block';
            }
        }
        visiblePackages += 3;

        // Hide the "Load more" button if all packages are shown
        if (visiblePackages >= totalPackages) {
            document.getElementById('load-more').style.display = 'none';
        }
    }

    // Initially hide packages except the first three
    for (let i = visiblePackages; i < boxes.length; i++) {
        boxes[i].style.display = 'none';
    }
    </script>
</body>
</html>
