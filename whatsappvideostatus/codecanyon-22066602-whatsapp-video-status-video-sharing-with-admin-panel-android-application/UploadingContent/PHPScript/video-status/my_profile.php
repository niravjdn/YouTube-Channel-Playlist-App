<?php include ('include/config.php'); 
session_start();
if(!isset($_SESSION['email']))
{
    session_destroy();
    
    echo "<script>window.location='index.php';</script>";
    exit;
     
}

 $sql = mysqli_query($conn,"select * from status_users");
 $result = mysqli_fetch_array($sql);

if(isset($_POST["profile_edit"]))
{ 
	$profile_id = $_POST['profile_id'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];

    $sql_edit = "UPDATE `status_users` SET username='".$name."',password='".$password."',email='".$email."' WHERE id = '".$profile_id."'";
	$result_edit = $conn->query($sql_edit);
	if($result_edit)
	{
	    echo '<script> alert("Your profile has been updated")
	                    window.location="my_profile.php" </script>';
	?>
    <?php
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
                        <h1>My Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">My Profile</li>
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
            ?>
           <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>My Profile</h4>
                            </div>
                            <div class="card-body">
                                <a  href="#home">My Profile</a>
                                 
                                <div class="tab-content pl-3 p-1">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form method="post">
                                          
                                          <div class="row form-group mt-3">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input name="name" id="name" rows="2" placeholder="Name" class="form-control" value="<?php echo $result['username']; ?>" required="" />
                                            </div>
                                          </div>    
                                          
                                           <div class="row form-group mt-3">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Email</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input name="email" id="email" rows="2" placeholder="email" class="form-control" value="<?php echo $result['email']; ?>" required="" />
                                            </div>
                                          </div> 
                                          
                                          <div class="row form-group mt-3">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Password</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input name="password" id="password" rows="2" placeholder="password" class="form-control" value="<?php echo $result['password']; ?>" required="" />
                                            </div>
                                          </div> 
                                            <input name="profile_id" type="hidden" value="<?php echo $result['id']; ?>" />
                                               
                                            <button type="submit" name="profile_edit" class="btn btn-success waves-effect waves-light pull-right">Edit</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div><!-- .content -->
        </div>

    <!-- Right Panel -->   
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
   
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>