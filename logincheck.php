<?php
session_start();
if (isset($_SESSION['status']) != "login") {
 header('location:../index.php');

} 

?>