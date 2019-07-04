<?php include ('include/config.php'); 
session_start();
if(!isset($_SESSION['email']))
{
    session_destroy();
    
    echo "<script>window.location='index.php';</script>";
    exit;
     
}
if (isset($_POST['submit'])) {
    $android_key = $_POST['android_key'];
    $edit_notification = mysqli_query($conn,"UPDATE status_users SET `android_key`='".$android_key."' WHERE email='".$_SESSION['email']."'");
    if ($edit_notification) {
        $success = "Server Key has been Updated";
    } else {
        $fail = "Something Went Wrong";
    }
}
$sql = mysqli_query($conn,"SELECT * FROM status_users where email='".$_SESSION['email']."'");
$fetch_key = mysqli_fetch_array($sql);
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
<body>
        <!-- Left Panel -->
            <?php
include('include/sidemenu.php');
?>
       <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php
include('include/header.php');
?>
       <!-- /header -->
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
                            <li class="active">Notification Setting</li>
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
                <div class="col-md-2"></div>
                  <div class="col-lg-8">
                    <div class="card">
                      <div class="card-header">
                        Notification Setting
                      </div>
                      <div class="card-body card-block">
                        <form id="form" name="form" method="post">
                          <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Android Server Key </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="android_key" placeholder="Android Server Key" class="form-control" value="<?php echo $fetch_key['android_key']; ?>" required="">

                            </div>
                          </div>
                      </div>
                      <div class="card-footer">
                        <?php $Constant = button; 
                        if ($Constant == "Active") {
                        ?>
                        <input id="submit" name="submit" class="btn btn-primary btn-sm float-right" type="submit" value="Submit">
                        <?php
                        } else {
                        ?>
                        <button type="button" onClick="return confirm('This function is currently disable as it is only a demo website, in your admin it will work perfect')" class="btn btn-primary btn-sm float-right">Submit</button>
                        <?php
                        }
                        ?>
                        <!-- <input type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" onclick="myFunction()" value="Submit"> -->
                    </div>
                    </form>                    
                <div class="col-md-3"></div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel --> 
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