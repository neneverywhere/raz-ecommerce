<div class="list-config">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Cấu hình</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_config/ListConfig"><i class="fa fa-reply" aria-hidden="true"></i>Quay lại</a>
	      </div>
		</div>
		<div class="panel-body">
			<form action="<?=base_url()?>backend/c_config/UpdateConfig" class="form-horizontal" method="post">
				<div class="form-group">
		          <label class="col-sm-2 control-label">Tiêu đề</label>
		          <div class="col-sm-10">
		            <input name="title" type="text" class="form-control" value="<?=$ListConfig['Title']?>">
		          </div>
				</div>

				<div class="form-group">
		          <label class="col-sm-2 control-label">Keyword</label>
		          <div class="col-sm-10">
		            <input name="keyword" type="text" class="form-control" value="<?=$ListConfig['Keyword']?>">
		          </div>
				</div>

				<div class="form-group">
		          <label class="col-sm-2 control-label">Description</label>
		          <div class="col-sm-10">
		            <input name="description" type="text" class="form-control" value="<?=$ListConfig['Description']?>">
		          </div>
				</div>

		        <div class="form-group">
		          <label class="col-sm-2 control-label">Logo</label>
		          <div class="col-sm-10">
		            <input id="image" type="text" name="logo" value="<?=$ListConfig['Logo']?>" class="form-control">
		            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
		            <img id="sideimage" class="pull-right fancybox" height="70" alt=""
		            <?php 
		            	if($ListConfig['Logo']!='') echo 'src'.'='.'"'. $ListConfig['Logo'].'"';
		            	else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
		            	// Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
		            ?>
		            >
		          </div>
		        </div>

		        <div class="form-group">
		          <label class="col-sm-2 control-label">Logo Footer</label>
		          <div class="col-sm-10">
		            <input id="image2" type="text" name="flogo" value="<?=$ListConfig['FLogo']?>" class="form-control">
		            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image2&relative_url=1" class="btn iframe-btn" type="button">Select</a>
		            <img id="sideimage2" class="pull-right fancybox" height="70" alt=""
		            <?php 
		            	if($ListConfig['FLogo']!='') echo 'src'.'='.'"'. $ListConfig['FLogo'].'"';
		            	else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
		            	// Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
		            ?>
		            >
		          </div>
		        </div>

		        <div class="form-group">
		          <label class="col-sm-2 control-label">Favicon</label>
		          <div class="col-sm-10">
		            <input id="image3" type="text" name="favicon" value="<?=$ListConfig['Favicon']?>" class="form-control">
		            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image3&relative_url=1" class="btn iframe-btn" type="button">Select</a>
		            <img id="sideimage3" class="pull-right fancybox" height="70" alt=""
		            <?php 
		            	if($ListConfig['Favicon']!='') echo 'src'.'='.'"'. $ListConfig['Favicon'].'"';
		            	else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
		            	// Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
		            ?>
		            >
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