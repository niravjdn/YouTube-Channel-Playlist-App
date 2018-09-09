<?php include ('include/config.php'); 
session_start();
if(!isset($_SESSION['email']))
{
    session_destroy();
    
    echo "<script>window.location='index.php';</script>";
    exit;
     
}

if (isset($_REQUEST['delete'])) {
    
    $delete = mysqli_query($conn,"delete from status_video where id = '".$_REQUEST['delete']."'");

    if ($delete) {
        $success = "Video has been deleted";
    } else {
        $fail = "Something went wrong";
    }
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
<style>
#video-list{    
    float: left;
    list-style: none;
    margin: 62px auto auto auto;
    padding: 0;
    width: 33%;
    position: absolute;
    z-index: 999;
    /*top: 66px;*/
    max-height: 300px;
    overflow: auto;
}
#video-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#video-list li:hover{background: #00aaf0;
    color: #fff;}
#search-box{padding: 10px;border: #00a8f0 1px solid;}
</style>
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
                        <h1>Video</h1>
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

        <?php 
        if (isset($_REQUEST['keyword'])) {
        ?>
            <div class="content mt-3">
            <?php include ('alert.php'); ?>

                <div class="animated fadeIn">
                    <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Video List</strong>
                                <a href="add-video.php" class="btn btn-primary mb-1 pull-right">
                                    Add Video
                                </a>
                            </div>                        
                            <div class="card-body">
                                <?php
                                $perpage = 5;
                                if(isset($_GET['page']) & !empty($_GET['page'])){
                                    $urlpage = $_GET['page'];
                                }else{
                                    $urlpage = 1;
                                }
                                $start = ($urlpage * $perpage) - $perpage;
                                $sql_video = mysqli_query ($conn,"select * from status_video where video_title like '%". $_GET ["keyword"] ."%'");
                                $totalres = mysqli_num_rows($sql_video);
                                $endpage = ceil($totalres/$perpage);
                                $startpage = 1;
                                $nextpage = $urlpage + 1;
                                $previouspage = $urlpage - 1;                        
                                ?> 
                                <nav aria-label="...">
                                    <form>
                                    <input type="text" id="search-box" name="keyword" autocomplete="off" placeholder="Search" class="form-control col-sm-4 pull-left mt-3" value="<?php echo $_GET['keyword']; ?>" required="">
                                    <div id="suggesstion-box"></div>

                                    <button class="btn btn-primary btn-sm pull-left mt-3" style="margin-left: 8px;margin-top: 21px !important;">Search</button>
                                    </form>
                                  <ul class="pagination pull-right mt-3">
                                    <?php if($urlpage != $startpage){ ?>
                                    <li class="page-item">
                                      <a class="page-link" href="?page=<?php echo $startpage ?>&keyword=<?php echo $_GET['keyword']; ?>" tabindex="-1" aria-label="Previous">
                                        <span aria-hidden="true">First</span>
                                      </a>
                                    </li>
                                    <?php } ?>
                                    <?php if($urlpage >= 2){ ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $previouspage ?>&keyword=<?php echo $_GET['keyword']; ?>"><?php echo $previouspage ?></a>
                                    </li>
                                    <?php } ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="?page=<?php echo $urlpage ?>&keyword=<?php echo $_GET['keyword']; ?>"><?php echo $urlpage ?></a>
                                    </li>
                                    <?php if($urlpage != $endpage){ ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $nextpage ?>&keyword=<?php echo $_GET['keyword']; ?>"><?php echo $nextpage ?></a>
                                    </li>
                                    <li class="page-item">
                                      <a class="page-link" href="?page=<?php echo $endpage ?>&keyword=<?php echo $_GET['keyword']; ?>" aria-label="Next">
                                        <span aria-hidden="true">Last</span>
                                      </a>
                                    </li>
                                    <?php } ?>
                                  </ul>
                                </nav>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th> <?php echo ('Video Title'); ?> </th>
                                        <th> <?php echo ('Category'); ?> </th>
                                        <th> <?php echo ('Subcategory'); ?> </th>
                                        <th> <?php echo ('Video'); ?> </th>
                                        <th> <?php echo ('Action'); ?> </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql1_video = mysqli_query ($conn,"select * from status_video where video_title like '%". $_GET ["keyword"] ."%' LIMIT $start, $perpage");
                                        $t= 1;
                                        while ($get_video = mysqli_fetch_array($sql1_video))
                                        {
                                        ?>
                                        <tr>
                                        <td><?php echo $t; ?></td>
                                        <td>
                                        <?php 
                                        $sql_get_category = mysqli_query($conn,"select * from status_category where id='".$get_video['cat_id']."'");
                                        $get_result = mysqli_fetch_array($sql_get_category);
                                        echo $get_result['category']; 
                                        ?>                                        
                                        </td>
                                        <td>
                                            <?php 
                                            $sql_get_subcategory = mysqli_query($conn,"select * from status_subcategory where id='".$get_video['subcat_id']."'");
                                            $get_subresult = mysqli_fetch_array($sql_get_subcategory);
                                            echo $get_subresult['subcategory']; 
                                            ?> 
                                        </td>
                                        <td><?php echo $get_video['video_title']; ?></td>
                                        <td>
                                            <video controls poster="images/thumbnail/<?php echo $get_video['image']; ?>" style="height: 200px;width: 350px">
                                                <source src="images/video/<?php echo $get_video['video']; ?>" type="video/mp4">
                                            </video>
                                        </td>
                                        <td>
                                        <?php $Constant = button; 
                                        if ($Constant == "Active") {
                                        ?>
                                    
                                        <a href="edit_video.php?id=<?php echo $get_video['id'];?>" type="button" class="btn btn-outline-success" onClick="" style="margin: 2px 2px 2px 2px;"><i class="fa fa-edit"></i>&nbsp; Edit</a>

                                        <a href="?delete=<?php echo $get_video['id']; ?>" onClick="return confirm('Are You Sure want to Delete')" class="btn btn-outline-danger" style="margin: 2px 2px 2px 2px;"><i class="fa fa-trash-o"></i>&nbsp; Delete</a>
                                        <?php
                                        } else {
                                        ?>
                                            <button type="button" class="btn btn-outline-success" onClick="return confirm('This function is currently disable as it is only a demo website, in your admin it will work perfect')" style="margin: 2px 2px 2px 2px;"><i class="fa fa-edit"></i>&nbsp; Edit</button>

                                            <button type="button" class="btn btn-outline-danger" onClick="return confirm('This function is currently disable as it is only a demo website, in your admin it will work perfect')" style="margin: 2px 2px 2px 2px;"><i class="fa fa-trash-o"></i>&nbsp; Delete</button>
                                        <?php
                                        }
                                        ?>
                                        </td>
                                        </tr>
                                        <?php
                                        $t++;
                                        }
                                        ?>
                                    </tbody>
                                  </table>
                                    <nav aria-label="...">
                                      <ul class="pagination pull-right mt-3">
                                        <?php if($urlpage != $startpage){ ?>
                                        <li class="page-item">
                                          <a class="page-link" href="?page=<?php echo $startpage ?>&keyword=<?php echo $_GET['keyword']; ?>" tabindex="-1" aria-label="Previous">
                                            <span aria-hidden="true">First</span>
                                          </a>
                                        </li>
                                        <?php } ?>
                                        <?php if($urlpage >= 2){ ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $previouspage ?>&keyword=<?php echo $_GET['keyword']; ?>"><?php echo $previouspage ?></a>
                                        </li>
                                        <?php } ?>
                                        <li class="page-item active">
                                            <a class="page-link" href="?page=<?php echo $urlpage ?>&keyword=<?php echo $_GET['keyword']; ?>"><?php echo $urlpage ?></a>
                                        </li>
                                        <?php if($urlpage != $endpage){ ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $nextpage ?>&keyword=<?php echo $_GET['keyword']; ?>"><?php echo $nextpage ?></a>
                                        </li>
                                        <li class="page-item">
                                          <a class="page-link" href="?page=<?php echo $endpage ?>&keyword=<?php echo $_GET['keyword']; ?>" aria-label="Next">
                                            <span aria-hidden="true">Last</span>
                                          </a>
                                        </li>
                                        <?php } ?>
                                      </ul>
                                    </nav>
                            </div>
                        </div>
                    </div>


                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->
        <?php
        } else {
        ?>
            <div class="content mt-3">
            <?php include ('alert.php'); ?>

            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Video List</strong>
                            <a href="add-video.php" class="btn btn-primary mb-1 pull-right">
                                Add Video
                            </a>
                        </div>                        
                        <div class="card-body">
                            <?php
                            $perpage = 5;
                            if(isset($_GET['page']) & !empty($_GET['page'])){
                                $urlpage = $_GET['page'];
                            }else{
                                $urlpage = 1;
                            }
                            $start = ($urlpage * $perpage) - $perpage;
                            $sql_video = mysqli_query ($conn,"select * from status_video");
                            $totalres = mysqli_num_rows($sql_video);
                            $endpage = ceil($totalres/$perpage);
                            $startpage = 1;
                            $nextpage = $urlpage + 1;
                            $previouspage = $urlpage - 1;                        
                            ?> 
                            <nav aria-label="...">
                                <form>
                                <input type="text" id="search-box" name="keyword" autocomplete="off" placeholder="Search" class="form-control col-sm-4 pull-left mt-3" required="">
                                <div id="suggesstion-box"></div>

                                <button class="btn btn-primary btn-sm pull-left mt-3" style="margin-left: 8px;margin-top: 21px !important;">Search</button>
                                </form>
                              <ul class="pagination pull-right mt-3">
                                <?php if($urlpage != $startpage){ ?>
                                <li class="page-item">
                                  <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                                    <span aria-hidden="true">First</span>
                                  </a>
                                </li>
                                <?php } ?>
                                <?php if($urlpage >= 2){ ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a>
                                </li>
                                <?php } ?>
                                <li class="page-item active">
                                    <a class="page-link" href="?page=<?php echo $urlpage ?>"><?php echo $urlpage ?></a>
                                </li>
                                <?php if($urlpage != $endpage){ ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a>
                                </li>
                                <li class="page-item">
                                  <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                                    <span aria-hidden="true">Last</span>
                                  </a>
                                </li>
                                <?php } ?>
                              </ul>
                            </nav>
                            <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th> <?php echo ('Video Title'); ?> </th>
                                    <th> <?php echo ('Category'); ?> </th>
                                    <th> <?php echo ('Subcategory'); ?> </th>
                                    <th> <?php echo ('Video'); ?> </th>
                                    <th> <?php echo ('Action'); ?> </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql1_video = mysqli_query ($conn,"select * from status_video LIMIT $start, $perpage");
                                    $t= 1;
                                    while ($get_video = mysqli_fetch_array($sql1_video))
                                    {
                                    ?>
                                    <tr>
                                    <td><?php echo $t; ?></td>
                                    <td>
                                    <?php 
                                    $sql_get_category = mysqli_query($conn,"select * from status_category where id='".$get_video['cat_id']."'");
                                    $get_result = mysqli_fetch_array($sql_get_category);
                                    echo $get_result['category']; 
                                    ?>                                        
                                    </td>
                                    <td>
                                        <?php 
                                        $sql_get_subcategory = mysqli_query($conn,"select * from status_subcategory where id='".$get_video['subcat_id']."'");
                                        $get_subresult = mysqli_fetch_array($sql_get_subcategory);
                                        echo $get_subresult['subcategory']; 
                                        ?> 
                                    </td>
                                    <td><?php echo $get_video['video_title']; ?></td>
                                    <td>
                                        <video controls poster="images/thumbnail/<?php echo $get_video['image']; ?>" style="height: 200px;width: 350px">
                                            <source src="images/video/<?php echo $get_video['video']; ?>" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>
                                    <?php $Constant = button; 
                                    if ($Constant == "Active") {
                                    ?>
                                
                                    <a href="edit_video.php?id=<?php echo $get_video['id'];?>" type="button" class="btn btn-outline-success" onClick="" style="margin: 2px 2px 2px 2px;"><i class="fa fa-edit"></i>&nbsp; Edit</a>

                                    <a href="?delete=<?php echo $get_video['id']; ?>" onClick="return confirm('Are You Sure want to Delete')" class="btn btn-outline-danger" style="margin: 2px 2px 2px 2px;"><i class="fa fa-trash-o"></i>&nbsp; Delete</a>
                                    <?php
                                    } else {
                                    ?>
                                        <button type="button" class="btn btn-outline-success" onClick="return confirm('This function is currently disable as it is only a demo website, in your admin it will work perfect')" style="margin: 2px 2px 2px 2px;"><i class="fa fa-edit"></i>&nbsp; Edit</button>

                                        <button type="button" class="btn btn-outline-danger" onClick="return confirm('This function is currently disable as it is only a demo website, in your admin it will work perfect')" style="margin: 2px 2px 2px 2px;"><i class="fa fa-trash-o"></i>&nbsp; Delete</button>
                                    <?php
                                    }
                                    ?>
                                    </td>
                                    </tr>
                                    <?php
                                    $t++;
                                    }
                                    ?>
                                </tbody>
                              </table>
                                <nav aria-label="...">
                                  <ul class="pagination pull-right mt-3">
                                    <?php if($urlpage != $startpage){ ?>
                                    <li class="page-item">
                                      <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                                        <span aria-hidden="true">First</span>
                                      </a>
                                    </li>
                                    <?php } ?>
                                    <?php if($urlpage >= 2){ ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a>
                                    </li>
                                    <?php } ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="?page=<?php echo $urlpage ?>"><?php echo $urlpage ?></a>
                                    </li>
                                    <?php if($urlpage != $endpage){ ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a>
                                    </li>
                                    <li class="page-item">
                                      <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                                        <span aria-hidden="true">Last</span>
                                      </a>
                                    </li>
                                    <?php } ?>
                                  </ul>
                                </nav>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <?php
        }
        ?>
    </div><!-- /#right-panel -->


<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

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
<script>
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