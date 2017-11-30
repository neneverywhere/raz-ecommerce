<div class="list-seo">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Code Header & Tracking</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_seo/EditCode"><i class="fa fa-wrench" aria-hidden="true"></i>Chỉnh sửa</a>
	      </div>
		</div>
		<div class="panel-body">
			<!--Code Header -->
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Code Header</label>
	          <div class="col-sm-10">
	          	<?=htmlentities($ListCode['Code_Header'])?> <!-- Hàm htmlentities echo code html -->
	          </div>
	        </div>

			<!--Code Tracking -->
	        <div class="form-group row">
	          <label class="col-sm-2 control-label">Code Tracking</label>
	          <div class="col-sm-10">
	          	<?=htmlentities($ListCode['Code_Tracking'])?> <!-- Hàm htmlentities echo code html -->
	          </div>
	        </div>
		</div>
	</div>
</div>