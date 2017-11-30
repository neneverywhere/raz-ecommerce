<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Nhân sự</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_personel/AddPersonel"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="18%">Tên</th>
          <th width="10%">Image</th>
          <th width="15%">Chức vụ</th>
          <th width="10%">Phone</th>
          <th width="15%">Email</th>
          <th width="15%">Địa chỉ</th>
          <th width="5%">Thứ tự</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i = 1;
      foreach ($ListPersonel as $list) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$list->Personel_Name?></td>
          <td><img class="fancybox" height="50" alt=""
              <?php 
                if($list->Personel_Image!='') echo 'src'.'='.'"'. $list->Personel_Image.'"';
                else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
                // Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
              ?>
          ></td>
          <td><?=$list->Personel_Pos?></td>
          <td><?=$list->Personel_Phone?></td>
          <td><?=$list->Personel_Email?></td>
          <td><?=$list->Personel_Address?></td>
          <td><?=$list->Personel_Order?></td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_personel/DetailPersonel/<?=$list->Personel_ID?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_personel/DeletePersonel/<?=$list->Personel_ID?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <div class="pagi text-center"><?=$pagination?></div><!-- Thanh phân trang -->
  </div>          
</div>
