<?php
include ('../include/config.php');
if (isset($_POST['token_id']) )
{
    $token_id=$_POST['token_id'];
    $device_type=$_POST['device_type'];

    $sql = "INSERT INTO `status_token`(`id`, `token_id`, `device_type`) VALUES (NULL,'".$token_id."','".$device_type."')";
    $res = mysqli_query($conn,$sql);
    if($res){
            
            $json[]=array("id"=>"True");
            $jdata['Status'] =  $json;
            echo json_encode($jdata);
    }
    else{
        $ar[]=array("id"=>"False");
        $arr['Status']=$ar;
        echo json_encode($arr);
    }
}
else{
    $ar[]=array("id"=>"False");
    $arr['Status']=$ar;
    echo json_encode($arr);
    //echo '<pre>',print_r($arr,1),'</pre>';
}
?>