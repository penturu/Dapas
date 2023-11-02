<?php
include "../connection.php";
$noRm = $_GET['no_rm'];
$result = mysqli_query($con, "DELETE FROM pasien WHERE no_rm='$noRm'");
echo "<meta http-equiv='refresh' content='0; url=?page=pasien-show'>";
