<?php include ('include/config.php'); 
session_start();
if(!isset($_SESSION['email']))
{
    session_destroy();
    
    echo "<script>window.location='index.php';</script>";
    exit;
     
}
if (isset($_POST['submit'])) {
    $sendresult     = array();
    $query          = mysqli_query($conn, "select android_key from status_users");
    $res            = mysqli_fetch_array($query);
    $google_api_key = $res['android_key'];
    
    // Notification Data
    
    $query2 = mysqli_query($conn, "select token_id from status_token where device_type='android'");
    $i      = 0;
    $reg_id = array();
    while ($res1 = mysqli_fetch_array($query2)) {
        
        $reg_id[$i] = $res1['token_id'];
        $i++;
    }
    
    $massage = $_POST['message'];
    
    
    if (isset($_POST['title'])) {
        $query =mysqli_query($conn,"select * from status_video where video_title='". @$_POST ["title"] ."'");
        $get_video = mysqli_fetch_array($query);

        $cat = mysqli_query($conn,"SELECT * FROM status_category where id='".$get_video['cat_id']."'");
        $fetch = mysqli_fetch_array($cat);

        $subcat = mysqli_query($conn,"SELECT * FROM status_subcategory where id='".$get_video['subcat_id']."'");
        $subfetch = mysqli_fetch_array($subcat);

        $data = array(
            "id" => $get_video['id'],
            "video_category" => $fetch['category'],
            "video_subcategory" => $subfetch['subcategory'],
            "cat_id" => $get_video['cat_id'],
            "subcat_id" => $get_video['subcat_id'],
            "video_title" => $get_video['video_title'],
            "video" => $get_video['video'],
            "image" => $get_video['image'],
            "view" => $get_video['views'],
            "download" => $get_video['download']
        );
        
        $title   = $_POST['title'];
        $image   = $get_video['image'];
        //$video_details = json_encode($data, true);
        

        $messages        = array(
           
            "video_details" => $data,
            "title" => $title,
            "message" => $massage
        );
        
        $message = json_encode($messages, true);
         
    } else {
        $title = "Notification";

        $message         = array(
            "title" => $title,
            "message" => $massage
        );
        
    }
    $registrationIds = $reg_id;    
    
    $fields          = array(
        'registration_ids' => $registrationIds,
        'data' => array("message" => $message),
    );

    $url             = 'https://fcm.googleapis.com/fcm/send';
    $headers         = array(
        'Authorization: key=' . $google_api_key, // . $api_key,
        'Content-Type: application/json'
    );

    $json            = json_encode($fields);
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    
    $result = curl_exec($ch);
    
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    
    curl_close($ch);
    $response = json_decode($result, true);
    if ($response['success'] > 0) {
        $time = time();
        $insert = mysqli_query($conn, "INSERT INTO `status_notification`(`id`, `title`, `message`, `image`, `created_at`) 
            VALUES (NULL,'" . $title . "','" . $massage . "','" . $image . "','".$time."')");
            if ($insert) {
                
                $success = "Notification Sent";
            }
        } else {

            $fail = "Something Went Wrong";
        }
    }
?>
<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>How To Draw | Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<style>
#video-list{    float: left;
    list-style: none;
    margin: 0;
    padding: 0;
    width: 92%;
    position: absolute;
    z-index: 999;
    /*top: 66px;*/
    max-height: 492px;
    overflow: auto;
    }
#video-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#video-list li:hover{background: #00aaf0;
    color: #fff;}
#search-box{padding: 10px;border: #00a8f0 1px solid;}
</style>
<body>
        <!-- Left Panel -->
            <?php
            include('include/sidemenu.php');
            ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php
        include('include/header.php');
        ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Notification</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Notification</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="content mt-3">
            <?php
            if(isset($success)) {
            ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?php echo $success;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php
            }
            if(isset($fail)) {
            ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?php echo $fail;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php
            }
            ?>
           <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Send Notification</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Notification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video Notification</a>
                                    </li>
                                </ul>
                                <div class="tab-content pl-3 p-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form id="form" name="form" method="post" enctype="multipart/form-data">
                                          <div class="row form-group mt-3">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Message</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="message" id="message" rows="2" placeholder="Content..." class="form-control" required=""></textarea>
                                            </div>
                                          </div>                                         
                                            <input id="submit" name="submit" class="btn btn-primary btn-sm float-right" type="submit" value="Submit">                   
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <form id="form" name="form" method="post" enctype="multipart/form-data">
                                          <div class="row form-group mt-3">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Video Title</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="search-box" name="title"autocomplete="off" placeholder="Enter Title" class="form-control" required="">
                                                <div id="suggesstion-box"></div>
                                            </div>
                                          </div>
                                          <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Message</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="message" id="message" rows="2" placeholder="Content..." class="form-control" required=""></textarea>
                                            </div>
                                          </div>                                         
                                            <input id="submit" name="submit" class="btn btn-primary btn-sm float-right" type="submit" value="Submit">                   
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div><!-- .content -->

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Notification List</strong>
                        </div>
                        <div class="card-body">
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Image</th>
                                  </tr>
                                </thead>

                                <tbody>                                  
                                    <?php
                                    $t = 1;
                                    $get_notification = mysqli_query($conn, "select * from status_notification");
                                    while ($notification = mysqli_fetch_array($get_notification)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $t; ?></td>
                                        <td><?php echo $notification['title']; ?></td>
                                        <td><?php echo $notification['message']; ?></td>
                                        <td><img src="images/thumbnail/<?php echo $notification['image']; ?>" width="100px" height="100px"></td>
                                    </tr>
                                    <?php
                                    $t++;
                                    }
                                    ?>            
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>

    <!-- Right Panel -->   
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
    $(document).ready(function(){
        $("#search-box").keyup(function(){
            $.ajax({
            type: "POST",
            url: "ajax/search_video.php",
            data:'keyword='+$(this).val(),
            beforeSend: function(){
            },
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background","#FFF");
            }
            });
        });
        $("#hrdSearch").click(function (){
            var v = $("#search-box").val(); 
            window.location.href = "search.php?keyword=" + v;
            return false;
        });
    });

    function selectCountry(val) {
        
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
    </script> 
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

</body>
</html>