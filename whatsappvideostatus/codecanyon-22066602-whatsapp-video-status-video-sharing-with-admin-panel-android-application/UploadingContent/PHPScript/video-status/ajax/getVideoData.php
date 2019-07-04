<?php
    $id=$_REQUEST['id'];

    include "../include/config.php";
    $sql="select * from status_video WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo (json_encode($row));
//            exit;
        }
    }
?>