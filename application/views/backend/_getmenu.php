<?php if($ListMenuTwo != array()) { ?>
<select name="parenttwo" id="parenttwo">
	<option value="0"></option>
	<?php foreach ($ListMenuTwo as $row) { ?>
	<option value="<?=$row['Menu_ID']?>"><?=$row['Menu_Name']?></option>
	<?php } ?>
</select>
<?php } ?>