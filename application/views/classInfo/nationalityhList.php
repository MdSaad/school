
<option value=""  >Select Nationality </option>
<?php foreach($nationalityListInfo as $k=>$v) { 
?>
<option value="<?php echo $v->id; ?>" <?php if($lastID == $v->id) { ?> selected="selected" <?php } ?> data-nationality-name="<?php echo $v->nationality_name ?>"  ><?php echo $v->nationality_name; ?></option>
<?php } ?>
