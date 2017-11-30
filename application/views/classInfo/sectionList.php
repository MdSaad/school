
<option value=""  >Select Section* </option>
<?php foreach($sectionListInfo as $k=>$v) { 
?>
<option value="<?php echo $v->id; ?>" <?php if($lastID == $v->id) { ?> selected="selected" <?php } ?> data-section-name="<?php echo $v->section_name ?>"  ><?php echo $v->section_name; ?></option>
<?php } ?>
