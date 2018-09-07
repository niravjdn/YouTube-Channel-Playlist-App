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
                        <h1>Update Video</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Video</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-3"></div>
                  <div class="col-lg-6">
                        
                    <form action="thumb_edit.php"  method="post" enctype="multipart/form-data">
                    <div class="card">
                      <div class="card-header">
                        <strong>Update</strong> video
                      </div>
                      <div class="card-body card-block">
                            <div class="form-group">
                                <?php
                        $id=$_GET['id'];
                      $sql=mysqli_query($conn,"select * from status_video where id=$id");
                    $res=mysqli_fetch_array($sql); 
                      ?>
                    
                                <label class=" form-control-label">Category</label>
                            
                                 <input type="hidden" name="id" id="id" value="<?php echo $res['id']?>">
                                <select class="form-control" name="cat_id" required="" id="cat_name">
                                    
                                    <option >Select Category</option>
                                    <?php
                                    $sql_category = mysqli_query($conn,"select id,category from status_category");
                                    while ($result = mysqli_fetch_array($sql_category))
                                    {
                                        if($res['cat_id']==$result['id']){
                                                          echo "<option selected=selected' value='".$result['id']."'>".$result['category'] ."</option>";
                                        }
                                        else{
                                                          echo "<option value='".$result['id']."'>".$result['category'] ."</option>";

                                        }
                                    ?>
                                       
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Subcategory</label>
                                <select class="form-control" name="subcat_id" required="" id="subcat">
                                    <option value="">Select Subcategory</option>
                                    <?php
                                    $sql2=mysqli_query($conn,"select id,subcategory from status_subcategory");
                                    while($res2=mysqli_fetch_array($sql2)){
                                        if($res['subcat_id']==$res2['id']){
                                           echo "<option selected=selected' value='".$res2['id']."'>".$res2['subcategory'] ."</option>"; 
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Video Title</label>
                                <input type="text" class="form-control" id="video_title" name="video_title" value="<?php echo $res['video_title']?>">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Video</label>
                                <input type="file" name="image" class="form-control" id="image" onchange="uploadFile()">
                                <input type="hidden" name="oldvideo" id="oldvideo" value="<?php echo $res['video']?>">
                                <input type="hidden" name="oldimage" id="oldimage" value="<?php echo $res['image']?>">
                            </div>
                            <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                            <h3 id="status"></h3>
                            <p id="loaded_n_total"></p>
                            <!-- <div class="form-group">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                                </div>
         
                                <div class="msg"></div>
                            </div> -->
                      </div>
                      <div class="card-footer">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                    </form>
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
    function _(el) {
      return document.getElementById(el);
    }

    function uploadFile() {
      var file = _("image").files[0];
       //alert(file.name+" | "+file.size+" | "+file.type);
      var formdata = new FormData();
      formdata.append("image", file);
      var ajax = new XMLHttpRequest();
      ajax.upload.addEventListener("progress", progressHandler, false);
      ajax.addEventListener("load", completeHandler, false);
      ajax.addEventListener("error", errorHandler, false);
      ajax.addEventListener("abort", abortHandler, false);
      ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
      //use file_upload_parser.php from above url
      ajax.send(formdata);
    }

    function progressHandler(event) {
      _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
      var percent = (event.loaded / event.total) * 100;
      _("progressBar").value = Math.round(percent);
      _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
    }

    function completeHandler(event) {
      _("status").innerHTML = event.target.responseText;
      _("progressBar").value = 0; //wil clear progress bar after successful upload
    }

    function errorHandler(event) {
      _("status").innerHTML = "Upload Failed";
    }

    function abortHandler(event) {
      _("status").innerHTML = "Upload Aborted";
    }
    </script>

    <script>
    $(document).ready(function(e) {

        $('#cat_name').change(function()
        {
         //   alert('cat_name');
        var cat_name=$('#cat_name').val();
        var script_url = "ajax/get_category.php";
        $.ajax({
            type:'POST',
            url:script_url,
            data:{      
            'cat_name':cat_name
            },
            success: function(data)
            {
                $('#subcat').html(data);
            }
        });
          
        });
    });
    </script>
</body>
</html>
