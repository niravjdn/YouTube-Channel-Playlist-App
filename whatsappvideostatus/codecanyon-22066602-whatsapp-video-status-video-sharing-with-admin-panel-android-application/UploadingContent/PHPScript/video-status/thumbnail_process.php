<?php include ('include/config.php'); 
session_start();
if(!isset($_SESSION['email']))
{
    session_destroy();
    
    echo "<script>window.location='index.php';</script>";
    exit;
     
}

if(isset($_POST['submit'])) {
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {

        $cat_id=$_POST['cat_id'];
        $subcat_id=$_POST['subcat_id'];
        $video_title=$_POST['video_title'];

        $path = $_FILES['image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $tmp_file = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileName = preg_replace("/[^a-zA-Z0-9.]/", "", $fileName);

        

        $thumb = explode('.', $fileName);
        $thumbname = $thumb[0];
        $thumbname = $thumbname . ".jpg";
        


        //unique file name
        // $datetime = date("Y-m-d hisa");
        // $thumbname .= $datetime;
        // $fileName = $datetime .  $fileName;    

        

        if ($file_path = "images/video/" . $fileName); {
        //echo "Here " . $fileName; exit();
        ?>

        <video id="video" src="<?php echo $file_path; ?>"  onerror="failed(event)" style="display: none" controls="controls" preload="none"></video>
        
        <script type="text/javascript">
            var index = 0;
            var video = document.getElementById('video');

            var starttime = 0.00;  // start at 7 seconds
            var endtime = 0.00;    // stop at 17 seconds
            video.addEventListener("timeupdate", function () {
                if (this.currentTime >= endtime) {
                    this.pause();
                    getThumb();
                }
            }, false);

            video.play();
            video.currentTime = starttime;
            function getThumb() {
                var filename = video.src;
                var w = video.videoWidth;//video.videoWidth * scaleFactor;
                var h = video.videoHeight;//video.videoHeight * scaleFactor;
                var canvas = document.createElement('canvas');

                canvas.width = w;
                canvas.height = h;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(video, 0, 0, w, h);

        //document.body.appendChild(canvas);
                var data = canvas.toDataURL("image/jpg");

        //send to php script
                var xmlhttp = new XMLHttpRequest;

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        console.log('saved');

                    }
                }

                console.log('saving');
                xmlhttp.open("POST", 'process_thumb.php', true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send('name=' + encodeURIComponent(filename) + '&data=' + data);
                xmlhttp.onreadystatechange = function () {//Call a function when the state changes.
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 //alert(xmlhttp.responseText==1);
                        if (xmlhttp.responseText == 1)
                        {
                            // window.location = 'video.php';
                        } else
                        {
                            alert('Please Try Again');
                            window.location = 'add-video.php';
                        }
                    }

                }
            }

            function failed(e) {
        // video playback failed - show a message saying why
                switch (e.target.error.code) {
                    case e.target.error.MEDIA_ERR_ABORTED:
                        console.log('You aborted the video playback.');
                        break;
                    case e.target.error.MEDIA_ERR_NETWORK:
                        console.log('A network error caused the video download to fail part-way.');
                        break;
                    case e.target.error.MEDIA_ERR_DECODE:
                        console.log('The video playback was aborted due to a corruption problem or because the video used features your browser did not support.');
                        break;
                    case e.target.error.MEDIA_ERR_SRC_NOT_SUPPORTED:
                        console.log('The video could not be loaded, either because the server or network failed or because the format is not supported.');
                        break;
                    default:
                        console.log('An unknown error occurred.');
                        break;
                }


            }

        </script>
        <?php
            $video_title = ucwords($video_title);
            $sql = "insert into status_video (`cat_id`,`subcat_id`,`video_title`,`video`,`image`) values ('$cat_id','$subcat_id','$video_title','$fileName','$thumbname')";
            $res = mysqli_query($conn,$sql);
            $success = "<div class='progress progress-striped active'>
                            <div class='progress-bar progress-bar-success' style='width:0%'></div>
                        </div>";
            echo  "<script>
                    window.onload = setTimeout(function(){
                    alert('Video successfully Inserted..');
                    window.location = 'add-video.php';
                }, 12000);</script>";
                //  exit();
            }
        } else {
            ?>
            <script>
                alert("! Please Select File !!!");
                window.location = 'add-video.php';
            </script>
            <?php
    }
}
?>
<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
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

        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-3"></div>
                  <div class="col-lg-6">
                      <?php 
                      if (isset($success)) {
                        echo "<h3>Please wait while thumbnail create.</h3>";
                        echo $success;
                      }
                      ?>
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(".progress-bar").animate({
            width: "100%"
        }, 12000);
    </script>
</body>
</html>
