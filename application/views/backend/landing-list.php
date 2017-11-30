<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Landing & Embed</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_landing/AddLanding"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="20%">Tên</th>
          <th width="20%">Liên kết</th>
          <th width="10%">Image</th>
          <th width="10%">Status</th>
          <th width="15%">Cập nhật</th>
          <th width="10%">Loại</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i=1;
      foreach ($ListLanding as $ListLanding) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$ListLanding['News_Landing_Name']?></td>
          <td><?=$ListLanding['News_Landing_Link']?></td>
          <td><?=$ListLanding['News_Landing_Image']?></td>
          <td>
            <?php echo (($ListLanding['News_Landing_Status'])==1? "Hiện":"")?>
            <?php echo (($ListLanding['News_Landing_Status'])==0? "Ẩn":"")?>
          </td>
          <td>
            <?php 
              $date = new DateTime($ListLanding['News_Landing_Date']);
              echo $date->format('d/m/Y H:i:s'); // Hiển thị ngày tháng dạng d/m/Y
            ?>
          </td>
          <td>
            <?php echo (($ListLanding['News_Landing_Type'])==1? "Landing":"")?>
            <?php echo (($ListLanding['News_Landing_Type'])==0? "Embeb":"")?>
          </td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_landing/DetailLanding/<?=$ListLanding['News_Landing_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_landing/DeleteLanding/<?=$ListLanding['News_Landing_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>          
</div>