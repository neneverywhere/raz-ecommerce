<div class="list-menu">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Menu</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_menu/ListMenu" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-slideshow">
      <form class="form-horizontal" action="<?=base_url()?>backend/c_menu/AddMenu" method="post">
        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input id="name" name="name" type="text" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Liên kết</label>
          <div class="col-sm-10">
            <input id="link" name="link" type="text" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Icon</label>
          <div class="col-sm-10">
            <input id="image" type="text" name="image" value="" class="form-control">
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
            <img id="sideimage" class="pull-right fancybox" src="<?=base_url()?>public/backend/images/no-image.png" height="100" alt="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Thứ tự</label>
          <div class="col-sm-10">
            <input id="order" name="order" type="text" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <input type="radio" name="status" value="1" checked>Hiện<br>
            <input type="radio" name="status" value="0"> Ẩn
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Target</label>
          <div class="col-sm-10">
            <input type="radio" name="target" value="" checked>Normal<br>
            <input type="radio" name="target" value="_blank"> Blank
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Mục cha</label>
          <div class="col-sm-10">
            <select name="parent" id="parent">
              <option value="0"></option>
              <?php foreach ($ListMenuOne as $row) { ?>
              <option value="<?=$row['Menu_ID']?>"><?=$row['Menu_Name']?></option>
              <?php } ?>
            </select>
            <span id="getmenu"></span> <!-- Đoạn này để lấy menu con ra -->
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
