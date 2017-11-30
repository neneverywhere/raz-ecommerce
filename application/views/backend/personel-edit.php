<?=$editor?>
<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Nhân sự</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_personel/ListPersonel" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-news-catalog">
      <form class="form-horizontal" action="<?=base_url()?>backend/c_personel/UpdatePersonel/<?=$DetailPersonel->Personel_ID?>" method="post">

        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input name="name" type="text" class="form-control" value="<?=$DetailPersonel->Personel_Name?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Hình ảnh</label>
          <div class="col-sm-10">
            <input id="image" type="text" name="image" value="<?=$DetailPersonel->Personel_Image?>" class="form-control">
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
            <img id="sideimage" class="pull-right fancybox" height="70" alt=""
              <?php 
                if($DetailPersonel->Personel_Image!='') echo 'src'.'='.'"'. $DetailPersonel->Personel_Image.'"';
                else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
                // Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
              ?>
            >
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Chức vụ</label>
          <div class="col-sm-10">
            <input name="pos" type="text" class="form-control" value="<?=$DetailPersonel->Personel_Pos?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Số điện thoại</label>
          <div class="col-sm-10">
            <input name="phone" type="text" class="form-control" value="<?=$DetailPersonel->Personel_Phone?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input name="email" type="text" class="form-control" value="<?=$DetailPersonel->Personel_Email?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Địa chỉ (khu vực)</label>
          <div class="col-sm-10">
            <input name="address" type="text" class="form-control" value="<?=$DetailPersonel->Personel_Address?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Thứ tự</label>
          <div class="col-sm-10">
            <input name="order" type="text" class="form-control" value="<?=$DetailPersonel->Personel_Order?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailPersonel->Personel_Status) ==1)? "checked":"" ?> type="radio" name="status" value="1" >Hiện<br>
            <input <?php echo (($DetailPersonel->Personel_Status) ==0)? "checked":"" ?> type="radio" name="status" value="0"> Ẩn
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Tóm tắt</label>
          <div class="col-sm-10">
            <textarea id="content" name="des" rows="15"><?=$DetailPersonel->Personel_Des?></textarea>
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
