
<option value=""  >Select Class* </option>
<?php foreach($classListInfo as $k=>$v) { 
?>
<option value="<?php echo $v->id; ?>" <?php if($lastID == $v->id) { ?> selected="selected" <?php } ?> data-class-name="<?php echo $v->class_name ?>"  ><?php echo $v->class_name; ?></option>
<?php } ?>
