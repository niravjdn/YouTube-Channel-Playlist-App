<?php
include ('../include/config.php');
$arrError = array();
if (!isset($_GET['category'])) {
    $arrError[] = "Category is not provided";
}
if (count($arrError) > 0) {
    $arrRecord['data']['success'] = 0;
    $arrRecord['data']['search_result'] = $arrError;
}

if (isset($_GET['category'])) {
    $result = mysqli_query($conn,"SELECT * FROM status_subcategory where cat_id='".$_GET['category']."'" );
    while ($get = mysqli_fetch_array($result))
    {
        $data[] = array(
            "id" => $get['id'],
            "subcategory" => $get['subcategory'],
            "subcategory_icon" => $get['subcat_icon']
       );
         $data1=array();
    }
        if (isset($data)) {
            if (!empty($data)) {
                $arrRecord['success'] = "1";
                $arrRecord['video'] = $data;
            } else {
                $arrRecord['success'] = "0";
                $arrRecord['video'] = 'no record found';
            }
        } else {
            $arrRecord['success'] = "0";
            $arrRecord['video'] = 'no record found';
        }
 }   
    echo json_encode($arrRecord);
    //echo '<pre>',print_r($arrRecord,1),'</pre>';
?>