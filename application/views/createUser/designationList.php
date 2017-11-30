
<option value=""  >Select Designation </option>
<?php foreach($designationListInfo as $k=>$v) { 
 $MaxID[$k] = $v->dAutoId;
 $lastID = max($MaxID);
?>
<option value="<?php echo $v->dAutoId; ?>" <?php if($lastID == $v->dAutoId) { ?> selected="selected" <?php } ?>  ><?php echo $v->designationName; ?></option>
<?php } ?>
