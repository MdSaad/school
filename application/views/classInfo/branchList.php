
<option value=""  >Select Branch* </option>
<?php foreach($branchListInfo as $k=>$v) { 
?>
<option value="<?php echo $v->id; ?>" <?php if($lastID == $v->id) { ?> selected="selected" <?php } ?> data-branch-name="<?php echo $v->branch_name ?>" ><?php echo $v->branch_name; ?></option>
<?php } ?>
