<?php if($productchild!=array()) { ?>
<select name="productchild">
  <option value="0"></option>
  <?php foreach ($productchild as $row) { ?>
  <option value="<?=$row['Product_Catalog_ID']?>"><?=$row['Product_Catalog_Name']?></option>
  <?php } ?>
</select>
<?php } ?>
