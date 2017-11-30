<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Danh mục sản phẩm</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_product_catalog/AddProductCatalog"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="25%">Tên</th>
          <th width="25%">Liên kết</th>
          <th width="10%">Thứ tự</th>
          <th width="10%">Status</th>
          <th width="10%">Hot</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($ListProductCatalogParent as $row) { ?>
        <tr class="warning">
          <td><?=$row['Product_Catalog_ID']?></td>
          <td><strong><?=$row['Product_Catalog_Name']?></strong></td>
          <td><?=$row['Product_Catalog_Link']?></td>
          <td><?=$row['Product_Catalog_Order']?></td>
          <td>
            <?php echo (($row['Product_Catalog_Status'])==1? "Hiện":"")?>
            <?php echo (($row['Product_Catalog_Status'])==0? "Ẩn":"")?>
          </td>
          <td>
            <?php echo (($row['Product_Catalog_Hot'])==1? "True":"")?>
            <?php echo (($row['Product_Catalog_Hot'])==0? "False":"")?>
          </td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_product_catalog/DetailProductCatalog/<?=$row['Product_Catalog_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_product_catalog/DeleteProductCatalog/<?=$row['Product_Catalog_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            <a target="blank" href="<?=base_url()?>san-pham/<?=$row['Product_Catalog_Alias']?>" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php $ListProductCatalogParent = $this->m_product_catalog->GetChild($row['Product_Catalog_ID']);
              if(isset($ListProductCatalogParent)) { ?>
          <?php foreach ($ListProductCatalogParent as $row) { ?>    
            <tr>
              <td><?=$row['Product_Catalog_ID']?></td>
              <td><i style="margin-right: 10px; margin-left: 10px" class="fa fa-angle-double-right" aria-hidden="true"></i><?=$row['Product_Catalog_Name']?></td>
              <td><?=$row['Product_Catalog_Link']?></td>
              <td><?=$row['Product_Catalog_Order']?></td>
              <td>
                <?php echo (($row['Product_Catalog_Status'])==1? "Hiện":"")?>
                <?php echo (($row['Product_Catalog_Status'])==0? "Ẩn":"")?>
              </td>
              <td>
                <?php echo (($row['Product_Catalog_Hot'])==1? "True":"")?>
                <?php echo (($row['Product_Catalog_Hot'])==0? "False":"")?>
              </td>
              <td class="action">
                <a href="<?=base_url()?>backend/c_product_catalog/DetailProductCatalog/<?=$row['Product_Catalog_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="<?=base_url()?>backend/c_product_catalog/DeleteProductCatalog/<?=$row['Product_Catalog_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                <a target="blank" href="<?=base_url()?>san-pham/<?=$row['Product_Catalog_Alias']?>" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php } ?>
        <?php } ?>
      <?php } ?>
      </tbody>
    </table>
  </div>          
</div>
