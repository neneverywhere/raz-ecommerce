<div class="dashboard">
	<div class="panel panel-default">
		<div class="panel-heading">
	      <span>Thông tin tài khoản</span>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Tên user đăng nhập:</dt>
				<dd><?=$this->session->userdata('User_Name');?></dd>
				<dt>Email user:</dt>
				<dd><?=$this->session->userdata('User_Email');?></dd>
			</dl>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6 dashboard-info">
			<div class="panel panel-default">
				<div class="panel-heading">
			      <span>Thống kê thông tin</span>
				</div>
				<div class="panel-body">
					<dl class="dl-horizontal">
						<dt>Tổng số danh mục tin:</dt>
						<dd class="text-center"><?=$newscatalog?></dd>
						<dt>Tổng số tin:</dt>
						<dd class="text-center"><?=$news?></dd>
						<dt>Tổng số danh mục sp:</dt>
						<dd class="text-center"><?=$productcatalog?></dd>
						<dt>Tổng số sản phẩm:</dt>
						<dd class="text-center"><?=$product?></dd>
						<dt>Tổng số slideshow:</dt>
						<dd class="text-center"><?=$slider?></dd>
						<dt>Tổng số gallery:</dt>
						<dd class="text-center"><?=$gallery?></dd>
						<dt>Tổng số menu:</dt>
						<dd class="text-center"><?=$menu?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 dashboard-website">
			<div class="panel panel-default">
				<div class="panel-heading">
			      <span>Thống kê cấu hình</span>
				</div>
				<div class="panel-body">
					<dl class="dl-horizontal">
						<dt>Tổng số thành viên:</dt>
						<dd class="text-center"><?=$user?></dd>
						<dt>Tên miền</dt>
						<dd class="text-center"><?=base_url()?></dd>
						<dt>Tổng các đối tác:</dt>
						<dd class="text-center"><?=$partner?></dd>
						<dt>Tổng số lượt truy cập:</dt>
						<dd class="text-center"><?=$uservisited?>
							<a data-toggle="tooltip" data-placement="right" title="Xem chi tiết" href="<?=base_url()?>backend/c_counter/CountVisited">
								<i class="fa fa-bar-chart" aria-hidden="true"></i>
							</a>
						</dd>
						<dt>Tổng số người đang online:</dt>
						<dd class="text-center"><?=$useronline?>
							<a data-toggle="tooltip" data-placement="right" title="Xem chi tiết" href="<?=base_url()?>backend/c_counter/CountOnline">
								<i class="fa fa-bar-chart" aria-hidden="true"></i>
							</a>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</div>