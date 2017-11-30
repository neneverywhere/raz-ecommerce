<div class="list-config">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
	      <span>Cấu hình</span>
	      <div class="pull-right">
	        <a class="plus" href="<?=base_url()?>backend/c_config/EditConfig"><i class="fa fa-wrench" aria-hidden="true"></i>Chỉnh sửa</a>
	      </div>
		</div>
		<div class="panel-body">
			<div class="title row">
				<div class="col-xs-3">
					<h4>Tiêu đề</h4>
				</div>
				<div class="col-xs-9">
					<p><?=$ListConfig['Title']?></p>
				</div>
			</div>
			<div class="keyword row">
				<div class="col-xs-3">
					<h4>Keyword</h4>
				</div>
				<div class="col-xs-9">
					<p><?=$ListConfig['Keyword']?></p>
				</div>
			</div>
			<div class="Description row">
				<div class="col-xs-3">
					<h4>Description</h4>
				</div>
				<div class="col-xs-9">
					<p><?=$ListConfig['Description']?></p>
				</div>
			</div>
			<div class="logo row">
				<div class="col-xs-3">
					<h4>Logo</h4>
				</div>
				<div class="col-xs-9">
					<p><img class="fancybox" height="100" alt=""
			            <?php 
			            	if($ListConfig['Logo']!='') echo 'src'.'='.'"'. $ListConfig['Logo'].'"';
			            	else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
			            	// Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
			            ?>
					>
					</p>
				</div>
			</div>
			<div class="flogo row">
				<div class="col-xs-3">
					<h4>Logo footer</h4>
				</div>
				<div class="col-xs-9">
					<p><img class="fancybox" height="100" alt=""
			            <?php 
			            	if($ListConfig['FLogo']!='') echo 'src'.'='.'"'. $ListConfig['FLogo'].'"';
			            	else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
			            	// Nếu có FLogo thì hiện FLogo, ko có thì hiện hình no img
			            ?>
					></p>
				</div>
			</div>
			<div class="title row">
				<div class="col-xs-3">
					<h4>Favicon</h4>
				</div>
				<div class="col-xs-9">
					<p><img height="100" alt=""
			            <?php 
			            	if($ListConfig['Favicon']!='') echo 'src'.'='.'"'. $ListConfig['Favicon'].'"';
			            	else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
			            	// Nếu có Favicon thì hiện Favicon, ko có thì hiện hình no img
			            ?>
					></p>
				</div>
			</div>
		</div>
	</div>
</div>