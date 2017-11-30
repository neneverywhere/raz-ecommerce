<?=$editor?>
<div class="list-intro">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Giới thiệu</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_info/ListIntro"><i class="fa fa-reply" aria-hidden="true"></i>Quay lại</a>
	      </div>
		</div>
		<div class="panel-body">
			<form action="<?=base_url()?>backend/c_info/UpdateIntro" class="form-horizontal" method="post">
		        <div class="form-group row">
		          <label class="col-sm-2 control-label">Nội dung</label>
		          <div class="col-sm-10">
		            <textarea id="content" name="intro" rows="15"><?=$Intro['Intro']?></textarea>
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