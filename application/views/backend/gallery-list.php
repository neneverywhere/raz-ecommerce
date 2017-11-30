<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Gallery</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_gallery/AddGallery"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="20%">Tên</th>
          <th width="10%"></th>
          <th width="10%">Hình đại diện</th>
          <th width="25%">Item</th>
          <th width="10%">Ngày cập nhật</th>
          <th width="10%">Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i=1;
      foreach ($ListGallery as $row) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$row['Gallery_Name']?></td>
          <td></td>
          <td><img src="<?=$row['Gallery_Image']?>" alt="" class="fancybox"></td>
          <td>
            <?php
              if($row['Gallery_Content']!=''){
              $item = explode(',', $row['Gallery_Content']);
              foreach ($item as $item) {
            ?>
            <img src="<?=$item?>" style="margin-bottom: 2px" class="fancybox" width="20%" alt="">
            <?php }} ?>
          </td>
          <td>
            <?php 
              $date = new DateTime($row['Gallery_Date']);
              echo $date->format('d/m/Y H:i:s'); // Hiển thị ngày tháng dạng d/m/Y
            ?>
          </td>
          <td>
            <?php echo (($row['Gallery_Status'])==1? "Hiện":"")?>
            <?php echo (($row['Gallery_Status'])==0? "Ẩn":"")?>
          </td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_gallery/DetailGallery/<?=$row['Gallery_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_gallery/DeleteGallery/<?=$row['Gallery_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <div class="pagi text-center"><?=$pagination?></div><!-- Thanh phân trang -->
  </div>          
</div>
