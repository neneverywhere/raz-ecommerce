<div class="list-contact">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Bản đồ</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_info/ListMap"><i class="fa fa-reply" aria-hidden="true"></i>Quay lại</a>
	      </div>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?=base_url()?>backend/c_info/UpdateMap" method="post">
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Google Map</label>
		          <div class="col-sm-10">
			          <textarea name="map" class="form-control" rows="5"><?=$Map['Map']?></textarea>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Chú thích</label>
		          <div class="col-sm-10">
		          	<textarea name="mapcontent" class="form-control" rows="3"><?=$Map['Map_Content']?></textarea>
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