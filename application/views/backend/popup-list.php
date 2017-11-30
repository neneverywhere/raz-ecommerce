<div class="list-slideshow">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Popup</span>
      <div class="pull-right">
        <a class="plus" href="<?=base_url()?>backend/c_popup/AddPopup"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="15%">Tên</th>
          <th width="15%">Liên kết</th>
          <th width="10%">Image</th>
          <th width="20%">Caption</th>
          <th width="10%">Status</th>
          <th width="10%">Thứ tự</th>
          <th width="10%">Delay</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($ListPopup as $ListPopup) { ?>
        <tr>
          <td><?=$ListPopup['Popup_Name']?></td>
          <td><?=$ListPopup['Popup_Link']?></td>
          <td><img class="fancybox" src="<?=$ListPopup['Popup_Image']?>" alt=""></td>
          <td><?=$ListPopup['Popup_Caption']?></td>
          <td>
            <?php echo (($ListPopup['Popup_Status'])==1? "Hiện":"")?>
            <?php echo (($ListPopup['Popup_Status'])==0? "Ẩn":"")?>
          </td>
          <td><?=$ListPopup['Popup_Order']?></td>
          <td><?=$ListPopup['Popup_Delay']?></td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_popup/DetailPopup/<?=$ListPopup['Popup_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_popup/DeletePopup/<?=$ListPopup['Popup_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>          
</div>
