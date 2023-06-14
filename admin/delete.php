<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];

    include "../config.php";

    $sql = "DELETE FROM `package` WHERE id = $id";
    $conn->query($sql);
}
header("location:admin_package.php");
exit;

?>
