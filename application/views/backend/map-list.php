<div class="list-contact">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Bản đồ</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_info/EditMap"><i class="fa fa-wrench" aria-hidden="true"></i>Chỉnh sửa</a>
	      </div>
		</div>
		<div class="panel-body">
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Google Map</label>
	          <div class="col-sm-10">
	          	<?=$Map['Map']?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Chú thích</label>
	          <div class="col-sm-10">
	          	<?=$Map['Map_Content']?>
	          </div>
	        </div>
		</div>
	</div>
</div>