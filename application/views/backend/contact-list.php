<div class="list-contact">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Thông tin liên hệ</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_info/EditContact"><i class="fa fa-wrench" aria-hidden="true"></i>Chỉnh sửa</a>
	      </div>
		</div>
		<div class="panel-body">
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Name</label>
	          <div class="col-sm-10">
				<?=$Contact['Name']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Hotline</label>
	          <div class="col-sm-10">
				<?=$Contact['Hotline']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Email</label>
	          <div class="col-sm-10">
				<?=$Contact['Email']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Address</label>
	          <div class="col-sm-10">
				<?=$Contact['Address']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Website</label>
	          <div class="col-sm-10">
				<?=$Contact['Website']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Copyright</label>
	          <div class="col-sm-10">
				<?=$Contact['Copyright']?>
	          </div>
	        </div>
	        <hr>
	        <h4 class="panel-heading">Cấu hình Email</h4>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Email nhận thông tin</label>
	          <div class="col-sm-10">
				<?=$Contact['Email_Send']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Protocol</label>
	          <div class="col-sm-10">
	          	<?=$Contact['Protocol']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">SMTP</label>
	          <div class="col-sm-10">
	          	<?=$Contact['SMTP']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Port</label>
	          <div class="col-sm-10">
	          	<?=$Contact['Port']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Email người gửi</label>
	          <div class="col-sm-10">
	          	<?=$Contact['Email_Root']?>
	          </div>
	        </div>
		</div>
	</div>
</div>