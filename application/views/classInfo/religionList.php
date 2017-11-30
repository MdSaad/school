
<option value=""  >Select Religion </option>
<?php foreach($religionListInfo as $k=>$v) { 
?>
  <option value="<?php echo $v->id; ?>" <?php if($lastID == $v->id) { ?> selected="selected" <?php } ?> data-religion-name="<?php echo $v->religion_name ?>"  ><?php echo $v->religion_name; ?></option>
<?php } ?>
