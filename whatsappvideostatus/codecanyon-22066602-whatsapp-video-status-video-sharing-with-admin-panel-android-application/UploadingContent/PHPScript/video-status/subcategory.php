<?php include ('include/config.php'); 
session_start();
if(!isset($_SESSION['email']))
{
    session_destroy();
    
    echo "<script>window.location='index.php';</script>";
    exit;
     
}
if(isset($_POST['submit'])) {
    $cat_id = $_POST['cat_id'];
    $subcategory = $_POST['subcategory'];
    $image=$_FILES['image']['name'];
    $path='images/subcategory/';
    move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);

    $sql = "insert into status_subcategory (`cat_id`,`subcategory`,`subcat_icon`) values ('$cat_id','$subcategory','$image')";
    $res = mysqli_query($conn,$sql);

    if ($res) {
    $success="Subcategory successfully inserted.";
    }
    else {
    $fail= "Something went wrong.";
    }
}
if(isset($_POST['update']))
{
    $id = $_POST['ids'];
    $cat_id = $_POST['cat_id'];
    $subcategory=$_POST['subcategory'];
    $image=$_FILES['uimages']['name'];
    $Oldimg = $_POST['old_imaget'];
    
    if($image == '')
    {
        $utattoo="update status_subcategory set `cat_id`='$cat_id',`subcategory`='$subcategory' where id='$id'";
        
    } else {

        $path="images/subcategory/";
        unlink($path . "" . $Oldimg);
        move_uploaded_file($_FILES['uimages']['tmp_name'],$path.$image);
        $utattoo="update status_subcategory set `cat_id`='$cat_id',`subcategory`='$subcategory',`subcat_icon`='$image' where id='$id'";          
    }

    $update = mysqli_query($conn,$utattoo);

    if ($update) {
        $success = "Subcategory has been Updated";
    } else {
        $fail = "Something went wrong";
    }
}
if (isset($_REQUEST['delete'])) {
    
    $delete = mysqli_query($conn,"delete from status_subcategory where id = '".$_REQUEST['delete']."'");

    if ($delete) {
        $success = "Subcategory has been deleted";
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
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
                        <h1>Add Subcategory</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Subcategory</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <?php include ('alert.php'); ?>

            <div class="card">
                <div class="card-body">
                    <center>
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal">
                            Add Subcategory
                        </button>
                    </center>
                </div>
            </div>

            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Subcategory</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th> <?php echo ('Category'); ?> </th>
                                    <th> <?php echo ('Subcategory'); ?> </th>
                                    <th> <?php echo ('images'); ?> </th>
                                    <th> <?php echo ('Action'); ?> </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $t= 1;
                                    $sql_subcategory = mysqli_query ($conn,"select * from status_subcategory");
                                    while ($get_sub = mysqli_fetch_array($sql_subcategory))
                                    {
                                    ?>
                                    <tr>
                                    <td><?php echo $t; ?></td>
                                    <td>
                                    <?php 
                                    $sql_get_category = mysqli_query($conn,"select * from status_category where id='".$get_sub['cat_id']."'");
                                    $get_result = mysqli_fetch_array($sql_get_category);
                                    echo $get_result['category']; 
                                    ?>                                        
                                    </td>
                                    <td><?php echo $get_sub['subcategory']; ?></td>
                                    <td><img src="images/subcategory/<?php echo $get_sub['subcat_icon']; ?>" style="width: 50px;"></td>
                                    <td>
                                        <?php $Constant = button; 
                                        if ($Constant == "Active") {
                                        ?>
                                        <button type="button" class="btn btn-outline-success" onClick="openEditModal(<?php echo $get_sub["id"];?>)" style="margin: 2px 2px 2px 2px;"><i class="fa fa-edit"></i>&nbsp; Edit</button>

                                        <a href="?delete=<?php echo $get_sub['id']; ?>" onClick="return confirm('Are You Sure want to Delete')" class="btn btn-outline-danger" style="margin: 2px 2px 2px 2px;"><i class="fa fa-trash-o"></i>&nbsp; Delete</a>
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
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

<div class="modal fade show in" id="editModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Edit Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ids" id="idd">
                <div class="form-group">
                    <label class=" form-control-label">Category</label>
                    <select name="cat_id" class="form-control" id="cat_id">
                        <option value="">Select Category</option>
                        <?php 
                        $select_cat = mysqli_query($conn,"select * from status_category");
                        while ($cat = mysqli_fetch_array($select_cat))
                        {
                            echo "<option value=".$cat['id'].">".$cat['category']."</option>";
                        }
                        ?>   
                    </select> 
                </div>
                <div class="form-group">
                  <label>Subcategory</label>
                  <input type="text" class="form-control" id="subcategory" name="subcategory">
                </div>
                <div class="form-group">
                  <label>Images</label>
                  <input type="file" accept="image/png, image/jpeg, image/gif" name="uimages" />
                  <input type="hidden" name="old_imaget" id="old_img">
                  <img id="images" style="width: 50px;height: 50px">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" name="update" value="Update">
            </div>
            </form>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Add Subcategory</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control" name="cat_id" required="">
                                <option value="">Select Category</option>
                                <?php
                                $sql_category = mysqli_query($conn,"select id,category from status_category");
                                while ($result = mysqli_fetch_array($sql_category))
                                {
                                ?>
                                    <option value="<?php echo $result['id']; ?>"><?php echo $result['category']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Subcategory</label>
                            <input type="text" name="subcategory" class="form-control" placeholder="Enter Subcategory">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Subcategory Image</label>
                            <input type="file" name="image" id="img" required="">
                            <img id="preview" class="img-fluid" width="150px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>


<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/lib/data-table/datatables-init.js"></script>

<script>

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        $('#preview').attr('src', e.target.result);
    }

        reader.readAsDataURL(input.files[0]);
    }
}

    $("#img").change(function() {
    readURL(this);
});

</script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    } );
</script>

<script>
    function openEditModal(id) {
        var url='ajax/getSubData.php?id='+id;
        
        $.ajax({
            url: url,
            type: 'GET',
            success: function (resp) {
                var json = $.parseJSON(resp);

                var idd=json.id;
                var cat_id=json.cat_id;
                var subcategory=json.subcategory;
                var image = json.subcat_icon;
                var oldimg = json.subcat_icon;

                $('#idd').val(idd);
                $('#cat_id').val(cat_id);
                $('#subcategory').val(subcategory);
                $('#images').attr("src","images/subcategory/"+image);
                $('#old_img').val(oldimg);
                
                $('#editModal').modal('show');              
                                    
            },
            error: function(e) {
                alert('Error: '+e);
            }
        });
    }
</script>


</body>
</html>