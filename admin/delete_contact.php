<!-- code to delete the bookings of costumers -->
<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];
//connect to database
    include "../config.php";
// sql query to delete a row from database table
    $sql = "DELETE FROM `contact` WHERE id = $id";
    $conn->query($sql);
}
header("location:contact.php");
exit;

?>
