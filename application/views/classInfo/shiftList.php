
<option value=""  >Select Shift* </option>
<?php foreach($shiftListInfo as $k=>$v) { 
?>
<option value="<?php echo $v->id; ?>" <?php if($lastID == $v->id) { ?> selected="selected" <?php } ?> data-shift-name="<?php echo $v->shift_name ?>"  ><?php echo $v->shift_name; ?></option>
<?php } ?>
