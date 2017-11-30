<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Danh mục dự án</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_project_catalog/AddProjectCatalog"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
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
          <th width="20%"><!--Mục cha--></th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($ListProjectCatalog as $row) { ?>
        <tr>
          <td><?=$row['Project_Catalog_ID']?></td>
          <td><?=$row['Project_Catalog_Name']?></td>
          <td><?=$row['Project_Catalog_Link']?></td>
          <td><?=$row['Project_Catalog_Order']?></td>
          <td>
            <?php echo (($row['Project_Catalog_Status'])==1? "Hiện":"")?>
            <?php echo (($row['Project_Catalog_Status'])==0? "Ẩn":"")?>
          </td>
          <td></td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_project_catalog/DetailProjectCatalog/<?=$row['Project_Catalog_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_project_catalog/DeleteProjectCatalog/<?=$row['Project_Catalog_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            <a target="blank" href="<?=base_url()?><?=$row['Project_Catalog_Link']?>" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>          
</div>
