<?php
include ('include/config.php'); 
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

    $cat_id = $_POST['cat_id'];
    $subcat = $_POST['subcat'];
    $video_title= $_POST['video_title'];

    $path = $_FILES['image']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $tmp_file = $_FILES['image']['tmp_name'];
    $r1 = chr(rand(ord('a'), ord('z')));
    $r2 = chr(rand(ord('a'), ord('z')));
    $r3 = chr(rand(ord('a'), ord('z')));
    $id = $r1 . $r2 . $r3;
    $fileName = $id . $_FILES['image']['name'];
    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "", $fileName);

      

    $thumb = explode('.', $fileName);
    $thumbname = $thumb[0];
    $thumbname = $thumbname . ".jpg";
    $file_path = "images/video/" . $fileName;
    $imagename = "category_" . time() . "." . $ext;

    if (move_uploaded_file($tmp_file, $file_path)) 

    $sql = "insert into status_video (`cat_id`,`subcat_id`,`video_title`,`video`,`image`) values ('$cat_id','$subcat','$video_title','$fileName','$thumbname')";
    $res = mysqli_query($conn,$sql);
    if ($res) {
        echo "File uploaded successfully!!";        
    } else {
        echo "failed";
    }
}
?>