<?php if($this->session->userdata('User_Group')==2) { ?>
<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Quản lý thành viên</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_admin/ListUser" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-news-catalog">
      <form class="form-horizontal" action="<?=base_url()?>backend/c_admin/UpdateUser/<?=$DetailUser['User_ID']?>" method="post">

        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input name="name" type="text" class="form-control" value="<?=$DetailUser['User_Name']?>" disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input name="email" type="text" class="form-control" value="<?=$DetailUser['User_Email']?>" disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Điện thoại</label>
          <div class="col-sm-10">
            <input name="phone" type="text" class="form-control" value="<?=$DetailUser['User_Mobile']?>" disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Phân quyền</label>
          <div class="col-sm-10">
            <select name="permission" class="form-control selectpicker show-tick">
              <option data-icon="glyphicon-user" data-subtext="(Xem, sửa bài viết)" <?php if($DetailUser['User_Group']==0) echo 'selected' ?> value="0">Editor</option>
              <option data-icon="glyphicon-education" data-subtext="(Xem, sửa, xóa bài viết)" <?php if($DetailUser['User_Group']==1) echo 'selected' ?> value="1">Admin</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Trạng thái</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailUser['User_Active']) ==1)? "checked":"" ?> type="radio" name="active" value="1">Kích hoạt<br>
            <input <?php echo (($DetailUser['User_Active']) ==0)? "checked":"" ?> type="radio" name="active" value="0"> Chưa kích hoạt
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
<?php }else echo 'Bạn không có quyền vào trang này' ?>