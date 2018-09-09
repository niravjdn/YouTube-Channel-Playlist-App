<?php include ('include/config.php');
session_start();
if(!isset($_SESSION['email']))
{
    session_destroy();
    
    echo "<script>window.location='index.php';</script>";
    exit;
     
}
if (isset($_POST['submit'])) {
    
    $category = $_POST['category'];
    $sql = mysqli_query($conn,"INSERT INTO `status_category`(`category`) VALUES ('".$category."')");

    if ($sql) {
        $success = "Category has been inserted";
    } else {
        $fail = "Something went wrong";
    }
}
if (isset($_POST['update'])) {
    
    $id = $_POST['ids'];
    $category = $_POST['category'];
    $sql = mysqli_query($conn,"UPDATE `status_category` SET `category`='".$category."' WHERE id='".$id."'");

    if (isset($sql)) {
        $success = "Category has been updated";
    } else {
        $fail = "Something went wrong";
    }
}
if (isset($_REQUEST['delete'])) {
    $delete = mysqli_query($conn,"delete from status_category where id = '".$_REQUEST['delete']."'");

    if ($delete) {
        $success = "Category has been deleted";
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
                        <h1>Category</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
              <center>
                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal">
                    Add Category
                </button>
              </center>
            </div>
        </div>

        <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <form method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class=" form-control-label">Category</label>
                            <input placeholder="Enter Category name" class="form-control" name="category" type="text" required="">
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
            <div class="content mt-3">
            <?php include ('alert.php'); ?>
                <div class="animated fadeIn">
                    <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Category</strong>
                            </div>
                        <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>                      
                                <?php
                                $t = 1;
                                $get_category = mysqli_query($conn,"select id,category from status_category");
                                while ($result = mysqli_fetch_array($get_category))
                                {
                                ?>
                                <tr>
                                <td><?php echo $t; ?></td>
                                <td><?php echo $result ['category']; ?></td>
                                <td> 
                                    <?php $Constant = button; 
                                    if ($Constant == "Active") {
                                    ?>
                                        <button type="button" class="btn btn-outline-success" onClick="openEditModal(<?php echo $result["id"];?>)" style="margin: 2px 2px 2px 2px;"><i class="fa fa-edit"></i>&nbsp; Edit</button>

                                        <a href="?delete=<?php echo $result['id']; ?>" onClick="return confirm('Are You Sure want to Delete')" class="btn btn-outline-danger" style="margin: 2px 2px 2px 2px;"><i class="fa fa-trash-o"></i>&nbsp; Delete</a>
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

<div class="modal fade show in" id="editModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel"> Edit Tattoo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ids" id="idd">
                <div class="form-group">
                  <label>Category</label>
                  <input type="text" class="form-control" id="category" name="category" required="">
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
    function openEditModal(t_id) {
        console.log(t_id);
        var url='ajax/getCategoryData.php?id='+t_id;
        
        $.ajax({
            url: url,
            type: 'GET',
            success: function (resp) {
                //console.log(resp);
                var json = $.parseJSON(resp);

                var idd=json.id;
                var category=json.category;
                
                //console.log(category);
                $('#idd').val(idd);
                $('#category').val(category);

                
                
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
