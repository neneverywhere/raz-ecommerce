<div class="list-menu">
  <div class="panel panel-default">
    <div class="panel-heading">
      <span>Khách hàng liên hệ</span>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%">ID</th>
          <th width="15%">Tên</th>
          <th width="15%">Email</th>
          <th width="10%">Điện thoại</th>
          <th width="15%">Tiêu đề</th>
          <th width="25%">Nội dung</th>
          <th width="10%">Ngày gửi mail</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i=1;
      foreach ($ListGuestInfo as $row) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$row['Guest_Name']?></td>
          <td><?=$row['Guest_Email']?></td>
          <td><?=$row['Guest_Phone']?></td>
          <td><?=$row['Guest_Subject']?></td>
          <td><?=$row['Guest_Content']?></td>
          <td>
            <?php 
              $date = new DateTime($row['Guest_Date_Submit']);
              echo $date->format('d/m/Y H:i:s'); // Hiển thị ngày tháng dạng d/m/Y
            ?>
          </td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_guest/DeleteGuest/<?=$row['Guest_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <div class="pagi text-center"><?=$pagination?></div>
  </div>          
</div>
