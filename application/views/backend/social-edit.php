<div class="list-contact">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Mạng xã hội</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_info/ListSocial"><i class="fa fa-reply" aria-hidden="true"></i>Quay lại</a>
	      </div>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?=base_url()?>backend/c_info/UpdateSocial" method="post">
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Facebook</label>
		          <div class="col-sm-10">
		          <input name="facebook" type="text" class="form-control" value="<?=$Social['Facebook']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Shopee</label>
		          <div class="col-sm-10">
		          <input name="skype" type="text" class="form-control" value="<?=$Social['Skype']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Zalo</label>
		          <div class="col-sm-10">
		          	<input name="zalo" type="text" class="form-control" value="<?=$Social['Zalo']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Youtube</label>
		          <div class="col-sm-10">
		          	<input name="youtube" type="text" class="form-control" value="<?=$Social['Youtube']?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Instagram</label>
		          <div class="col-sm-10">
		          	<input name="google" type="text" class="form-control" value="<?=$Social['Google_Plus']?>">
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