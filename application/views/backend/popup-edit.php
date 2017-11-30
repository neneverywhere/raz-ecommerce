<div class="list-slideshow">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Popup</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_popup/ListPopup" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-slideshow">
      <form class="form-horizontal" action="<?=base_url()?>backend/c_popup/UpdatePopup/<?=$DetailPopup['Popup_ID']?>" method="post">
        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input id="name" name="name" type="text" class="form-control" value="<?=$DetailPopup['Popup_Name']?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Liên kết</label>
          <div class="col-sm-10">
            <input id="link" name="link" type="text" class="form-control" value="<?=$DetailPopup['Popup_Link']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Hình ảnh</label>
          <div class="col-sm-10">
            <input id="image" type="text" name="image" value="<?=$DetailPopup['Popup_Image']?>" class="form-control" required>
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
            <img id="sideimage" class="pull-right fancybox" src="<?=$DetailPopup['Popup_Image']?>" height="100" alt="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Thứ tự</label>
          <div class="col-sm-10">
            <input id="order" name="order" type="text" class="form-control" value="<?=$DetailPopup['Popup_Order']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailPopup['Popup_Status']) ==1)? "checked":"" ?> type="radio" name="status" value="1">Hiện<br>
            <input <?php echo (($DetailPopup['Popup_Status']) ==0)? "checked":"" ?> type="radio" name="status" value="0"> Ẩn
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Caption</label>
          <div class="col-sm-10">
            <textarea name="caption" class="form-control" rows="3"><?=$DetailPopup['Popup_Caption']?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Thời gian delay (thời gian khi vào trang web đến khi hiện popup)</label>
          <div class="col-sm-10">
            <input id="delay" name="delay" type="text" class="form-control" value="<?=$DetailPopup['Popup_Delay']?>">
          </div>
        </div>

        <!-- Form actions -->
        <div class="form-group">
          <div class="col-sm-12 text-center">
            <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            <button type="reset" class="btn btn-danger">Làm lại</button>
          </div>
        </div>
      </form>
    </div>
  </div>          
</div>
