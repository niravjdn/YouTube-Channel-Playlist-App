<?php

$file = (isset($_FILES["image"]) ? $_FILES["image"] : 0);

if (!$file) { // if file not chosen
    die("ERROR: Please browse for a file before clicking the upload button");
}
if($file["error"]) {

    die("ERROR: File couldn't be processed");

}
        $path = $_FILES['image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $tmp_file = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileName = preg_replace("/[^a-zA-Z0-9.]/", "", $fileName);
        

        $thumb = explode('.', $fileName);
        $thumbname = $thumb[0];
        $thumbname = $thumbname . ".jpg";
        $file_path = "images/video/" . $fileName;
        $imagename = "category_" . time() . "." . $ext;
        move_uploaded_file($tmp_file, $file_path)
?>