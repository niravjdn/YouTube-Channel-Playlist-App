<?php include ('include/config.php'); 
session_start();
if(!isset($_SESSION['email']))
{
    session_destroy();
    
    echo "<script>window.location='index.php';</script>";
    exit;
     
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Video Status | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


    <!-- Left Panel -->

    <?php include ('include/sidemenu.php'); ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include ('include/header.php'); ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">            
            <?php
            $get_category = mysqli_query($conn,"select * from status_category");
            $category = mysqli_num_rows($get_category);
            ?>
            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-list bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                            <div class="h5 text-secondary mb-0 mt-1"><?php echo $category; ?></div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Category</div>
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="category.php">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $get_sub_category = mysqli_query($conn,"select * from status_subcategory");
            $subcategory = mysqli_num_rows($get_sub_category);
            ?>
            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-list bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                            <div class="h5 text-secondary mb-0 mt-1"><?php echo $subcategory; ?></div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Subcategory</div>
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="subcategory.php">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $get_video = mysqli_query($conn,"select * from status_video");
            $video = mysqli_num_rows($get_video);
            ?>
            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-video-camera bg-danger p-3 font-2xl mr-3 float-left text-light"></i>
                            <div class="h5 text-secondary mb-0 mt-1"><?php echo $video; ?></div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Video</div>
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="video.php">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-bell bg-danger p-3 font-2xl mr-3 float-left text-light"></i>
                            <div class="h5 text-secondary mb-0 mt-1"><?php echo $video; ?></div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Send Push Notification</div>
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="notification.php">Push Notification <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-cog bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                            <div class="h5 text-secondary mb-0 mt-1"><?php echo $video; ?></div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Push Notification Setting</div>
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="notification_setting.php">Go to Setting <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-user bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                            <div class="h5 text-secondary mb-0 mt-1"><?php echo $video; ?></div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">My Profile</div>
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="my_profile.php">Edit Profile <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>

</body>
</html>