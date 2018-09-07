<?php
include ('../include/config.php'); 
session_start();

if($_POST['message1'])
{

$query=mysqli_query($conn,"select * from dr_users");
$res=mysqli_fetch_array($query);
$google_api_key=$res['google_api'];

// Notification Data
//$reg_id=$row['reg_id'];
$query2=mysqli_query($conn,"select * from dr_token");
$i=0;
$reg_id=array();
while ($res1=mysqli_fetch_array($query2))
{

$reg_id[$i]= $res1['token_id'];
$i++;
}

$massage = $_POST['message1'];
$title = $_POST['title1'];
$image = $_POST['image1'];

    
    $registrationIds =  $reg_id ;
    //print_r($registrationIds); exit;
    $message = array('message' => $massage,'imageUrl' => "http://192.168.1.119/freak/clinicadmin/uploads/mobileuser_1470724915.png");
    $fields = array(
        'registration_ids'  => $registrationIds,
        'data'      => $message
    );
    //print_r($fields); exit;
    $url = 'https://fcm.googleapis.com/fcm/send';
    $headers = array(
        'Authorization: key='.$google_api_key,// . $api_key,
        'Content-Type: application/json'
    );
    $json =  json_encode($fields);
    //echo $json;
    $ch = curl_init();
   
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$json);

    $result = curl_exec($ch);
    //print_r($result); exit();
    
    if ($result === FALSE){
        die('Curl failed: ' . curl_error($ch));
    }   

    curl_close($ch);
    $response=json_decode($result,true);
    //print_r($response); exit();
    if($response['success'] > 0)
    {
        //echo "insert into dr_notification values(NULL,'".$massage."')"; exit;
        $insert=mysqli_query($conn,"insert into dr_notification values(NULL,'".$title."','".$massage."','".$image."')");
        if($insert)
        {
            echo 1;
        }
    }
    else
    {
       echo 0;
    }
}
?>