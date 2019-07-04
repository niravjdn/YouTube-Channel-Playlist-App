<?php
include ('../include/config.php');
if(!empty($_POST["keyword"])) {


$query ="select video_title from status_video where video_title like '%". $_POST ["keyword"] ."%';";
$result = $conn->query($query);
if(!empty($result)) {
?>
<ul id="video-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["video_title"]; ?>');"><?php echo $country["video_title"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>

