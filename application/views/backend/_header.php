<header>
  <div class="container">
    <div class="top row">
      <div class="col-xs-4 logo text-left">
        <div class="img"><a href="<?=base_url()?>backend/c_dashboard/DashBoard"><img src="<?=base_url()?>public/backend/images/user_admin.png" width="50" alt=""><span class="logo-title">Admin Program</span></a></div>
      </div>
      <div class="col-xs-4 back-home text-center">
        <a target="blank" href="<?=base_url()?>">Xem trang chủ</a>
      </div>
      <div class="col-xs-4 login-info text-right">
        <img class="img-circle" src="<?=base_url()?>public/backend/images/avarta.jpg" width="50" alt="">
        <span class="name"><?=$this->session->userdata('User_Name');?></span>
        <i class="fa fa-caret-down" aria-hidden="true"></i>
        <div class="action">
          <ul class="list-unstyled text-left">
            <!--<li><a href="#!"><i class="fa fa-key" aria-hidden="true"></i>Change password</a></li>-->
            <li><a href="<?=base_url()?>backend/c_admin/LogOut"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
