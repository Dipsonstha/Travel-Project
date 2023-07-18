<?php 
session_start();
if(isset($_GET['unset']) && $_GET['unset']==='true'){
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['id']);
    header('Location: http://localhost/Travel-Project/Travel-Project/home.php');
    exit();
}
?>