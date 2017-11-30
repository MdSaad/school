
<option value=""  >Select Group* </option>
<?php foreach($groupListInfo as $k=>$v) { 
?>
<option value="<?php echo $v->id; ?>" <?php if($lastID == $v->id) { ?> selected="selected" <?php } ?>  data-group-name="<?php echo $v->group_name ?>" ><?php echo $v->group_name; ?></option>
<?php } ?>
