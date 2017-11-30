<?php $list = $this->m_news_catalog->ListNewsCatalog();?>
<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Danh mục tin tức</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_news_catalog/AddNewsCatalog"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="20%">Tên</th>
          <th width="20%">Liên kết</th>
          <th width="10%">Thứ tự</th>
          <th width="10%">Status</th>
          <th width="10%">Hot</th>
          <th width="10%"><!--Mục cha--></th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i = 1;
      foreach ($list as $row) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$row['News_Catalog_Name']?></td>
          <td><?=$row['News_Catalog_Link']?></td>
          <td><?=$row['News_Catalog_Order']?></td>
          <td>
            <?php echo (($row['News_Catalog_Status'])==1? "Hiện":"")?>
            <?php echo (($row['News_Catalog_Status'])==0? "Ẩn":"")?>
          </td>
          <td>
            <?php echo (($row['News_Catalog_Hot'])==1? "True":"")?>
            <?php echo (($row['News_Catalog_Hot'])==0? "False":"")?>
          </td>
          <td></td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_news_catalog/DetailNewsCatalog/<?=$row['News_Catalog_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_news_catalog/DeleteNewsCatalog/<?=$row['News_Catalog_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            <a target="blank" href="<?=base_url()?><?=$row['News_Catalog_Link']?>" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>          
</div>
