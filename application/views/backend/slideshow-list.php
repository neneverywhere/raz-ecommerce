<div class="list-slideshow">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Slideshow</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_slideshow/AddSlideshow"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="15%">Tên</th>
          <th width="15%">Liên kết</th>
          <th width="10%">Image</th>
          <th width="25%">Caption</th>
          <th width="10%">Status</th>
          <th width="10%">Thứ tự</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i=1;
      foreach ($ListSlideshow as $row) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$row['Slider_Name']?></td>
          <td><?=$row['Slider_Link']?></td>
          <td>
            <img src="<?=$row['Slider_Image']?>" class="fancybox" alt="">
          </td>
          <td><?=$row['Slider_Caption']?></td>
          <td>
            <?php echo (($row['Slider_Status'])==1? "Hiện":"")?>
            <?php echo (($row['Slider_Status'])==0? "Ẩn":"")?>
          </td>
          <td><?=$row['Slider_Order']?></td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_slideshow/DetailSlideshow/<?=$row['Slider_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_slideshow/DeleteSlideshow/<?=$row['Slider_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa tin này không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>          
</div>
