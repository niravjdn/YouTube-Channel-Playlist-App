<?php
include ('../include/config.php');
$cat_name=$_POST['cat_name'];
?>
<select name="subcat_id" class="form-control" required="">
	<option>Select Subcategory</option>
    <?php
    $sql_subcategory = mysqli_query($conn,"select id,subcategory from status_subcategory where cat_id = '".$cat_name."'");
    while ($resultsub = mysqli_fetch_array($sql_subcategory))
    {
    ?>
        <option value="<?php echo $resultsub['id']; ?>"><?php echo $resultsub['subcategory']; ?></option>
    <?php
    }
    ?>
</select>
                    