<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Đối tác</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_partner/AddPartner"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="20%">Tên</th>
          <th width="20%">Liên kết</th>
          <th width="10%">Logo</th>
          <th width="25%">Mô tả</th>
          <th width="5%">Thứ tự</th>
          <th width="5%">Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i=1;
      foreach ($ListPartner as $row) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$row['Partner_Name']?></td>
          <td><?=$row['Partner_Link']?></td>
          <td>
            <img class="fancybox" alt=""
              <?php 
                if($row['Partner_Image']!='') echo 'src'.'='.'"'. $row['Partner_Image'].'"';
                else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
                // Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
              ?>
            >
          </td>
          <td><?=$row['Partner_Des']?></td>
          <td><?=$row['Partner_Order']?></td>
          <td>
            <?php echo (($row['Partner_Status'])==1? "Hiện":"")?>
            <?php echo (($row['Partner_Status'])==0? "Ẩn":"")?>
          </td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_partner/DetailPartner/<?=$row['Partner_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_partner/DeletePartner/<?=$row['Partner_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>          
</div>


