<?php
include '../connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($con, "SELECT path_asesmen FROM asesmen WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
    $imagePath = $data['path_asesmen'];

    $deleteQuery = mysqli_query($con, "DELETE FROM asesmen WHERE id = $id");

    if ($deleteQuery) {

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        
        echo "<meta http-equiv='refresh' content='0; url=?page=asesmen-show'>";
    } else {
        echo "Failed to delete the record.";
    }
} else {
    echo "Invalid request.";
}
?>