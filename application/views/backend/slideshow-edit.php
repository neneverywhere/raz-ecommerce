<div class="list-slideshow">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Slideshow</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_slideshow/ListSlideshow" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-slideshow">
      <form class="form-horizontal" action="<?=base_url()?>backend/c_slideshow/EditSlideshow/<?=$DetailSlideshow['Slider_ID']?>" method="post">
        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input id="name" name="name" type="text" class="form-control" value="<?=$DetailSlideshow['Slider_Name']?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Liên kết</label>
          <div class="col-sm-10">
            <input id="link" name="link" type="text" class="form-control" value="<?=$DetailSlideshow['Slider_Link']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Hình ảnh</label>
          <div class="col-sm-10">
            <input id="image" type="text" name="image" value="<?=$DetailSlideshow['Slider_Image']?>" class="form-control" required>
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
            <img id="sideimage" class="pull-right fancybox" src="<?=$DetailSlideshow['Slider_Image']?>" height="100" alt="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Thứ tự</label>
          <div class="col-sm-10">
            <input id="order" name="order" type="text" class="form-control" value="<?=$DetailSlideshow['Slider_Order']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailSlideshow['Slider_Status']) ==1)? "checked":"" ?> type="radio" name="status" value="1">Hiện<br>
            <input <?php echo (($DetailSlideshow['Slider_Status']) ==0)? "checked":"" ?> type="radio" name="status" value="0"> Ẩn
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Caption</label>
          <div class="col-sm-10">
            <textarea name="caption" class="form-control" rows="3"><?=$DetailSlideshow['Slider_Caption']?></textarea>
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
