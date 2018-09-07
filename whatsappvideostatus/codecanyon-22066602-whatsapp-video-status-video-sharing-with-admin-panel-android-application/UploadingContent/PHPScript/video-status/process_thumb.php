<?php
$thumbs_dir="images/thumbnail/";
if (isset($_POST["name"]) && $_POST["name"]) {
    // Grab the MIME type and the data with a regex for convenience
    if (!preg_match('/data:([^;]*);base64,(.*)/', $_POST['data'], $matches)) {
        die("error");
    }
    $file = basename($_POST['name'], '.mp4');
    // Decode the data
    $data = $matches[2];
    $data = str_replace(' ', '+', $data);
    $data = base64_decode($data);

    file_put_contents($thumbs_dir . $file . ".jpg", $data);
echo 1;
    //print 'done ' . $file;
 //   exit;
}
?>