<div class="list-menu">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Menu</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_menu/AddMenu"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>
    <table class="table table-condensed">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="20%">Tên</th>
          <th width="20%">Liên kết</th>
          <th width="10%">Icon</th>
          <th width="10%">Status</th>
          <th width="10%">Thứ tự</th>
          <th width="15%">Mục cha</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($ListMenu as $row) { ?>
        <tr class="success">
          <td><?=$row['Menu_ID']?></td>
          <td style="font-weight: bold"><?=$row['Menu_Name']?></td>
          <td><?=$row['Menu_Link']?></td>
          <td><?=$row['Menu_Icon']?></td>
          <td>
            <?php echo (($row['Menu_Status'])==1? "Hiện":"")?>
            <?php echo (($row['Menu_Status'])==0? "Ẩn":"")?>
          </td>
          <td><?=$row['Menu_Order']?></td>
          <td></td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_menu/DetailMenu/<?=$row['Menu_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_menu/DeleteMenu/<?=$row['Menu_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php if(isset($row['menulv2'])) foreach ($row['menulv2'] as $key) { ?>
        <tr class="warning">
          <td><?=$key['Menu_ID']?></td>
          <td><i style="margin-right: 10px; margin-left: 10px" class="fa fa-angle-right" aria-hidden="true"></i><?=$key['Menu_Name']?></td>
          <td><?=$key['Menu_Link']?></td>
          <td><?=$key['Menu_Icon']?></td>
          <td>
            <?php echo (($key['Menu_Status'])==1? "Hiện":"")?>
            <?php echo (($key['Menu_Status'])==0? "Ẩn":"")?>
          </td>
          <td><?=$key['Menu_Order']?></td>
          <td><?php
            if($key['Menu_Parent_ID']!=0){
              $pname = $this->m_menu->GetNameParent($key['Menu_Parent_ID']);

              if($pname['Menu_Parent_ID']!=0){
                $p2name = $this->m_menu->GetNameParent($pname['Menu_Parent_ID']);
                echo $p2name['Menu_Name'].'/'.$pname['Menu_Name'];
              }else
              echo $pname['Menu_Name'];
            }
          ?></td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_menu/DetailMenu/<?=$key['Menu_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_menu/DeleteMenu/<?=$key['Menu_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
          <?php if(isset($key['menulv3'])) foreach ($key['menulv3'] as $re) { ?>
          <tr>
            <td><?=$re['Menu_ID']?></td>
            <td><i style="margin-right: 20px; margin-left: 20px" class="fa fa-angle-double-right" aria-hidden="true"></i><?=$re['Menu_Name']?></td>
            <td><?=$re['Menu_Link']?></td>
            <td><?=$re['Menu_Icon']?></td>
            <td>
              <?php echo (($re['Menu_Status'])==1? "Hiện":"")?>
              <?php echo (($re['Menu_Status'])==0? "Ẩn":"")?>
            </td>
            <td><?=$re['Menu_Order']?></td>
            <td><?php
              if($re['Menu_Parent_ID']!=0){
                $pname = $this->m_menu->GetNameParent($re['Menu_Parent_ID']);

                if($pname['Menu_Parent_ID']!=0){
                  $p2name = $this->m_menu->GetNameParent($pname['Menu_Parent_ID']);
                  echo $p2name['Menu_Name'].'/'.$pname['Menu_Name'];
                }else
                echo $pname['Menu_Name'];
              }
            ?></td>
            <td class="action">
              <a href="<?=base_url()?>backend/c_menu/DetailMenu/<?=$re['Menu_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a href="<?=base_url()?>backend/c_menu/DeleteMenu/<?=$re['Menu_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </td>
          </tr>
          <?php } ?>
        <?php } ?>
      <?php } ?>
      </tbody>
    </table>
    <!--<div class="pagi text-center"><?=$pagination?></div> Thanh phân trang -->
  </div>          
</div>
