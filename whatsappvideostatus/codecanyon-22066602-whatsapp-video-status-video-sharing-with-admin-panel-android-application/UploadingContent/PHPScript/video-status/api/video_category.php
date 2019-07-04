<?php
include ('../include/config.php');

    $get_category = mysqli_query($conn,"select id,category from status_category");
    while ($result = mysqli_fetch_array($get_category))
    {
        $data[] = array(
            "id" => $result['id'],
            "category" => $result['category']
        );
    }
        if (isset($data)) {
            if (!empty($data)) {
                $arrRecord['success'] = "1";
                $arrRecord['category'] = $data;
            } else {
                $arrRecord['success'] = "0";
                $arrRecord['category'] = 'no record found';
            }
        } else {
            $arrRecord['success'] = "0";
            $arrRecord['category'] = 'no record found';
        } 
    echo json_encode($arrRecord);
    //echo '<pre>',print_r($arrRecord,1),'</pre>';
?>