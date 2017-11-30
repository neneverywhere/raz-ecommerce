<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Sản phẩm</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_product/AddProduct"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>

    <div class="filter">
      <!-- form filter -->
      <form class="form-inline" method="post" action="<?=base_url()?>backend/c_filter/FillProduct">
        <div class="form-group">
          <select name="catalog" class="form-control selectpicker show-tick" title="Chọn danh mục" data-live-search="true" data-width="250px">
            <option value="">Tât cả</option>
            <?php
              $parent = $this->m_product->GetParent();
              foreach ($parent as $row) { 
            ?>
            <?php 
              $check = $this->m_product->Check($row['Product_Catalog_ID']);
              if ($check==false) {
            ?>
              <option value="<?=$row['Product_Catalog_ID']?>"><?=$row['Product_Catalog_Name']?></option>

            <?php }else{ ?>
              <optgroup label="<?=$row['Product_Catalog_Name']?>">
              <?php 
                $child = $this->m_product->productchild($row['Product_Catalog_ID']);
                foreach ($child as $key) { 
              ?>
                <option value="<?=$key['Product_Catalog_ID']?>"><?=$key['Product_Catalog_Name']?></option>
              <?php }//foreach child ?>
              </optgroup>
            <?php } //if ?>
            <?php } //foreach parent?>
          </select>
        </div>
        <div class="form-group">
          <input name="name" class="form-control" type="text" placeholder="Tên">
        </div>
        <div class="form-group">
          <select name="hot" class="form-control selectpicker show-tick" title="Nổi bật" data-width="100px">
            <option value="">Tât cả</option>
            <option value="0">False</option>
            <option value="1">True</option>
          </select>
        </div>
        <div class="form-group">
          <select name="status" class="form-control selectpicker show-tick" title="Status" data-width="100px">
            <option value="">Tât cả</option>
            <option value="0">Ẩn</option>
            <option value="1">Hiện</option>
          </select>
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit" class="form-control"><strong>Lọc</strong></button>
        </div>
      </form>
      <!-- form -->
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="10%">Danh mục</th>
          <th width="25%">Tên</th>
          <th width="20%">Liên kết</th>
          <th width="10%">Image</th>
          <th width="10%">Nổi bật</th>
          <th width="10%">Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i=1;
      foreach ($ListProduct as $row) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$this->m_product->GetNameParent($row['Product_Catalog_ID'])?></td>
          <td><?=$row['Product_Name']?></td>
          <td><?=$this->m_product->GetLinkCatalog($row['Product_Catalog_ID'])?>/<?=$row['Product_Alias']?>.html</td>
          <td><img class="fancybox" height="50" alt=""
              <?php 
                if($row['Product_Image']!='') echo 'src'.'='.'"'. $row['Product_Image'].'"';
                else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
                // Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
              ?>
          ></td>
          <td>
            <?php echo (($row['Product_Hot'])==1? "True":"")?>
            <?php echo (($row['Product_Hot'])==0? "False":"")?>
          </td>
          <td>
            <?php echo (($row['Product_Status'])==1? "Hiện":"")?>
            <?php echo (($row['Product_Status'])==0? "Ẩn":"")?>
          </td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_product/DetailProduct/<?=$row['Product_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_product/DeleteProduct/<?=$row['Product_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            <a target="blank" href="<?=base_url()?><?=$this->m_product->GetLinkCatalog($row['Product_Catalog_ID'])?>/<?=$row['Product_Alias']?>.html" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <div class="pagi text-center"><?=$pagination?></div><!-- Thanh phân trang -->
  </div>          
</div>
