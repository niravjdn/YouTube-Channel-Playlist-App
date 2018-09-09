<?php
if(isset($_POST['submit'])) {
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {

        $cat_id=$_POST['cat_id'];
        $subcat_id=$_POST['subcat_id'];
        $video_title=$_POST['video_title'];

        $path = $_FILES['image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $tmp_file = $_FILES['image']['tmp_name'];
        $r1 = chr(rand(ord('a'), ord('z')));
        $r2 = chr(rand(ord('a'), ord('z')));
        $r3 = chr(rand(ord('a'), ord('z')));
        $id = $r1 . $r2 . $r3;
        $fileName = $id . $_FILES['image']['name'];
        $fileName=str_replace(' ','_',$fileName);
        $thumb = explode('.', $fileName);
        $thumbname = $thumb[0];
        $thumbname = $thumbname . ".jpg";
        $file_path = "images/video/" . $fileName;
        $imagename = "category_" . time() . "." . $ext;

        if (move_uploaded_file($tmp_file, $file_path)) {
        
        $sql = "insert into status_video (`cat_id`,`subcat_id`,`video_title`,`video`,`image`) values ('$cat_id','$subcat_id','$video_title','$fileName','$thumbname')";
        $res = mysqli_query($conn,$sql);
        //echo "Here " . $fileName; exit();
        ?>

        <video id="video" src="<?php echo $file_path; ?>"  onerror="failed(event)" style="display: none" controls="controls" preload="none"></video>

        <script type="text/javascript">
            var index = 0;
            var video = document.getElementById('video');

            var starttime = 7;  // start at 7 seconds
            var endtime = 1;    // stop at 17 seconds
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
        //  alert(xmlhttp.responseText==1);
                        if (xmlhttp.responseText == 1)
                        {
                            window.location = 'video.php';
                        } else
                        {
                            alert('Please Try Again');
                            window.location = 'video.php';
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
                //  exit();
            } else {
                
            }
        } else {
            ?>
            <script>
                alert("! Please Select File !!!");
                window.location = 'video.php';
            </script>
            <?php
    }
}
if(isset($_POST['update']))
{  
    $idx=$_POST['ids'];
    $cat_id=$_POST['cat_id'];
    $subcat_id=$_POST['subcat_id'];
    $video_title=$_POST['video_title'];
    $Oldvideo = $_POST['old_video'];
    $Oldimg = $_POST['old_image'];
    $image_check=$_FILES['image']['name'];
    
    if($image_check == '')
    {
        $uvideo="UPDATE `status_video` SET `cat_id`='".$cat_id."',`subcat_id`='".$subcat_id."',`video_title`='".$video_title."',`video`='".$Oldvideo."',`image`='".$Oldimg."' WHERE id='".$idx."'";
        
    } else {

        $path = $_FILES['image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $tmp_file = $_FILES['image']['tmp_name'];
        $r1 = chr(rand(ord('a'), ord('z')));
        $r2 = chr(rand(ord('a'), ord('z')));
        $r3 = chr(rand(ord('a'), ord('z')));
        $id = $r1 . $r2 . $r3;
        $fileName = $id . $_FILES['image']['name'];
        $fileName=str_replace(' ','_',$fileName);
        $thumb = explode('.', $fileName);
        $thumbname = $thumb[0];
        $thumbname = $thumbname . ".jpg";
        $file_path = "images/video/" . $fileName;
        $imagename = "category_" . time() . "." . $ext; 
        $pathde= "images/video/"; 
        $imagepath =  "images/thumbnail/";      
        unlink($pathde . "" . $Oldvideo);
        unlink($imagepath . "" . $Oldimg);
        move_uploaded_file($tmp_file, $file_path);
            $uvideo = "UPDATE status_video SET `cat_id`='$cat_id',`subcat_id`='$subcat_id',`video_title`='$video_title',
            video='$fileName',image='$thumbname' WHERE id='$idx'";
    }

    $update = mysqli_query($conn,$uvideo);
    ?>

        <video id="video" src="<?php echo $file_path; ?>"  onerror="failed(event)" style="display: none" controls="controls" preload="none"></video>

        <script type="text/javascript">
            var index = 0;
            var video = document.getElementById('video');

            var starttime = 7;  // start at 7 seconds
            var endtime = 17;    // stop at 17 seconds
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
                            window.location = 'video.php';
                        } else
                        {
                            alert('Please Try Again');
                            window.location = 'video.php';
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
}
if (isset($_REQUEST['delete'])) {
    
    $delete = mysqli_query($conn,"delete from status_video where id = '".$_REQUEST['delete']."'");

    if ($delete) {
        $success = "Subcategory has been deleted";
    } else {
        $fail = "Something went wrong";
    }
}
?>