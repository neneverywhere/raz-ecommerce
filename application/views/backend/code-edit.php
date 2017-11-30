<div class="list-seo">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Code Header & Tracking</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_seo/ListCode"><i class="fa fa-reply" aria-hidden="true"></i>Quay về</a>
	      </div>
		</div>
		<div class="panel-body">
	      	<form class="form-horizontal" action="<?=base_url()?>backend/c_seo/UpdateCode" method="post">
				<!--Code Header -->
		        <div class="form-group">
		          <label class="col-sm-2 control-label">Code Header</label>
		          <div class="col-sm-10">
		            <textarea name="codeheader" class="form-control" rows="5">
			          	<?=$ListCode['Code_Header']?>
		            </textarea>
		          </div>
		        </div>

				<!--Code Tracking -->
		        <div class="form-group">
		          <label class="col-sm-2 control-label">Code Tracking</label>
		          <div class="col-sm-10">
		            <textarea name="codetracking" class="form-control" rows="5">
			          	<?=$ListCode['Code_Tracking']?>
		            </textarea>
		          </div>
		        </div>

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