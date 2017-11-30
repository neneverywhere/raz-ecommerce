<div class="list-contact">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Thông tin liên hệ</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_info/ListContact"><i class="fa fa-reply" aria-hidden="true"></i>Quay lại</a>
	      </div>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?=base_url()?>backend/c_info/UpdateContact" method="post">
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Name</label>
		          <div class="col-sm-10">
		          <input name="name" type="text" class="form-control" value="<?=$Contact['Name']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Hotline</label>
		          <div class="col-sm-10">
		          <input name="hotline" type="text" class="form-control" value="<?=$Contact['Hotline']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Email</label>
		          <div class="col-sm-10">
		          <input name="email" type="text" class="form-control" value="<?=$Contact['Email']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Address</label>
		          <div class="col-sm-10">
		            <textarea name="address" class="form-control" rows="5"><?=$Contact['Address']?></textarea>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Website</label>
		          <div class="col-sm-10">
		          <input name="website" type="text" class="form-control" value="<?=$Contact['Website']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Copyright</label>
		          <div class="col-sm-10">
		          <input name="copyright" type="text" class="form-control" value="<?=$Contact['Copyright']?>">
		          </div>
		        </div>

		        <hr>
		        <h4 class="panel-heading">Cấu hình Email</h4>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Email nhận thông tin</label>
		          <div class="col-sm-10">
		          <input name="email-send" type="text" class="form-control" value="<?=$Contact['Email_Send']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Protocol</label>
		          <div class="col-sm-10">
		          <select name="protocol" class="selectpicker">
		          	<option value="<?=$Contact['Protocol']?>"><?=$Contact['Protocol']?></option>
		          	<option value="">---</option>
		          	<option value="ssl">ssl</option>
		          	<option value="tls">tls</option>
		          	<option value="starttls">starttls</option>
		          </select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">SMTP</label>
		          <div class="col-sm-10">
		          <input name="smtp" type="text" class="form-control" value="<?=$Contact['SMTP']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Port</label>
		          <div class="col-sm-10">
		          <input name="port" type="text" class="form-control" value="<?=$Contact['Port']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Email người gửi</label>
		          <div class="col-sm-10">
		          <input name="email-root" type="text" class="form-control" value="<?=$Contact['Email_Root']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Password</label>
		          <div class="col-sm-10">
		          <input name="password-root" type="password" class="form-control" value="<?=$Contact['Password_Root']?>">
		          </div>
		        </div>
		        <!-- Action -->
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