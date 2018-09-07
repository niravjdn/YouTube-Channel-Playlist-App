<?php
include ('../include/config.php');

$arrError = array();

    $offset=0;
    $page_result=$_GET['noofrecords'];
    
    if($_GET['pageno'])
    {
       $page_value = $_GET['pageno'];
       if($page_value > 1)
       {
          $offset = ($page_value - 1) * $page_result;
      }
    }
    $result = mysqli_query($conn,"SELECT * FROM status_video order by views DESC limit $offset, $page_result");
    $nums = count($result);
    $num = $nums / $page_result ;
    while ($get = mysqli_fetch_array($result)) 
    {

        $cat = mysqli_query($conn,"SELECT * FROM status_category where id='".$get['cat_id']."'");
        $fetch = mysqli_fetch_array($cat);

        $subcat = mysqli_query($conn,"SELECT * FROM status_subcategory where id='".$get['subcat_id']."'");
        $subfetch = mysqli_fetch_array($subcat);

        $dataall[] = array(
          "id" => $get['id'],
          "video_category" => $fetch['category'],
          "video_subcategory" => $subfetch['subcategory'],
          "cat_id" => $get['cat_id'],
          "subcat_id" => $get['subcat_id'],
          "video_title" => $get['video_title'],
          "video" => $get['video'],
          "image" => $get['image'],
          "view" => $get['views'],
          "download" => $get['download']
        );
    }
    if (isset($dataall)) {
        if (!empty($dataall)) {
            $arrRecord['success'] = "1";
            $arrRecord['video'] = $dataall;
        } else {
            $arrRecord['success'] = "0";
            $arrRecord['video'] = 'no record found';
        }
    } else {
        $arrRecord['success'] = "0";
        $arrRecord['video'] = 'no record found';
    }
echo json_encode($arrRecord);
//echo '<pre>',print_r($arrRecord,1),'</pre>';
?>