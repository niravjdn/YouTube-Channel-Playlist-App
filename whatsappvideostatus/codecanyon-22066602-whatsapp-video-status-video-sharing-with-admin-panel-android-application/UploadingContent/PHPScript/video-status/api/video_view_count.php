<?php
include ('../include/config.php');

$arrRecord = array();

if (isset($_GET["video_id"])) {

    $count = mysqli_query($conn,"UPDATE status_video SET views= views+1 WHERE id = '".$_GET['video_id']."'");

    $rowsSelect = mysqli_query($conn,"SELECT views FROM status_video where id='".$_GET['video_id']."'" );
    $rowc = mysqli_fetch_array($rowsSelect);

    if ($count > 0) {
        foreach ($rowc as $row) {
            $arrRecord['data']['success'] = 1;
            $arrRecord['data']['view'] = $row;
        }
    } else {
        $arrRecord['data']['success'] = 0;
        $arrRecord['data']['video_views'] = 'no record found';
    }
} elseif (isset($_GET['download'])) {

    $downloadcount = mysqli_query($conn,"UPDATE status_video SET download= download+1 WHERE id = '".$_GET['download']."'");

    $rowsSelect = mysqli_query($conn,"SELECT download FROM status_video where id='".$_GET['download']."'" );
    $rowc = mysqli_fetch_array($rowsSelect);

    if ($downloadcount > 0) {
        foreach ($rowc as $row) {
            $arrRecord['data']['success'] = 1;
            $arrRecord['data']['download'] = $row;
        }
    } else {
        $arrRecord['data']['success'] = 0;
        $arrRecord['data']['video_download'] = 'no record found';
    }
} else {
    $arrRecord['data']['success'] = 0;
    $arrRecord['data']['video_download'] = 'no record found';
}

echo json_encode($arrRecord);
?>