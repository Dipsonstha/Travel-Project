<?php

$conn = mysqli_connect('localhost', 'root', '', 'book_db');
// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
