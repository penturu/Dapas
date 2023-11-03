<?php
include '../connection.php';

$kodeAsesmen = $_GET['kode_asesmen'];
$result = mysqli_query($con, "SELECT * FROM asesmen WHERE kode_asesmen='$kodeAsesmen'");
while ($data = mysqli_fetch_array($result)) {
}
if (isset($_POST['submit'])) {

    $result = mysqli_query($con, );
    echo "<script>window.location.href = '?page=pasien-show';</script>";
}

?>