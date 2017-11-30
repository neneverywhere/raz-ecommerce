<div id="test"></div>
<div class="sidebar col-sm-2">
  <ul class="list-unstyled">
    <li><a name="c_dashboard" href="<?=base_url()?>backend/c_dashboard/DashBoard"><i class="fa fa-home" aria-hidden="true"></i>Dashboard</a></li>
    <li>
      <a name="c_guest" href="<?=base_url()?>backend/c_guest/ListGuestInfo"><i class="fa fa-user" aria-hidden="true"></i>Khách hàng liên hệ</a>
    </li>
    <li>
      <a name="c_guest" href="<?=base_url()?>backend/c_bill/ListBill"><i class="fa fa-money" aria-hidden="true"></i>Quản lý đơn hàng</a>
    </li>
    <!--<li>
      <a name="c_partner" href="<?=base_url()?>backend/c_partner/ListPartner"><i class="fa fa-black-tie" aria-hidden="true"></i>Đối tác</a>
    </li>-->
    <!--<li>
      <a name="c_partner" href="<?=base_url()?>backend/c_personel/ListPersonel"><i class="fa fa-retweet" aria-hidden="true"></i>Người môi giới</a>
    </li>-->
    <li>
      <a class="has-sub" href="#!"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Quản lý tin tức<i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a>
      <ul class="sub">
        <li><a name="c_news_catalog" href="<?=base_url()?>backend/c_news_catalog/ListNewsCatalog">Danh mục tin tức</a></li>
        <li><a name="c_news" href="<?=base_url()?>backend/c_news/ListNews">Tin tức</a></li>
      </ul>
    </li>
    <!--<li>
      <a class="has-sub" href="#!"><i class="fa fa-diamond" aria-hidden="true"></i>Quản lý dự án<i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a>
      <ul class="sub">
        <li><a name="c_project_catalog" href="<?=base_url()?>backend/c_project_catalog/ListProjectCatalog">Danh mục dự án</a></li>
        <li><a name="c_project" href="<?=base_url()?>backend/c_project/ListProject">Dự án</a></li>
      </ul>
    </li>-->
    <li>
      <a class="has-sub" href="#!"><i class="fa fa-product-hunt" aria-hidden="true"></i>Quản lý sản phẩm<i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a>
      <ul class="sub">
        <li><a name="c_product_catalog" href="<?=base_url()?>backend/c_product_catalog/ListProductCatalog">Danh mục sản phẩm</a></li>
        <li><a name="c_product" href="<?=base_url()?>backend/c_product/ListProduct">Chit tiết sản phẩm</a></li>
      </ul>
    </li>
    <li>
      <a class="has-sub" href="#!"><i class="fa fa-file-o" aria-hidden="true"></i>Tin tức khác<i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a>
      <ul class="sub">
        <li><a name="c_landing" href="<?=base_url()?>backend/c_landing/ListLanding">Landing Page</a></li>
      </ul>
    </li>
    <li>
      <a class="has-sub" href="#!"><i class="fa fa-windows" aria-hidden="true"></i>Quản lý plugin<i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a>
      <ul class="sub">
        <li><a name="c_slideshow" href="<?=base_url()?>backend/c_slideshow/ListSlideshow">Slideshow</a></li>
        <!--<li><a name="c_gallery" href="<?=base_url()?>backend/c_gallery/ListGallery">Gallery</a></li>
        <li><a name="c_popup" href="<?=base_url()?>backend/c_popup/ListPopup">Popup</a></li>-->
      </ul>
    </li>
    <li>
      <a class="has-sub" href="#!"><i class="fa fa-cogs" aria-hidden="true"></i>Cấu hình website<i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a></a>
      <ul class="sub">
        <li><a name="c_menu" href="<?=base_url()?>backend/c_menu/ListMenu">Menu</a></li>
        <li><a name="c_config" href="<?=base_url()?>backend/c_config/ListConfig">Cấu hình</a></li>
      </ul>
    </li>
    <li>
      <a class="has-sub" href="#!"><i class="fa fa-info-circle" aria-hidden="true"></i>Thông tin<i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a>
      <ul class="sub">
        <li><a name="c_info" href="<?=base_url()?>backend/c_info/ListIntro">Thông tin giới thiệu</a></li>
        <li><a name="c_info" href="<?=base_url()?>backend/c_info/ListContact">Thông tin liên hệ</a></li>
        <li><a name="c_info" href="<?=base_url()?>backend/c_info/ListMap">Nhúng bản đồ</a></li>
        <li><a name="c_info" href="<?=base_url()?>backend/c_info/ListSocial">Mạng xã hội</a></li>
      </ul>
    </li>
    <li>
      <a class="has-sub" href="#!"><i class="fa fa-globe" aria-hidden="true"></i>Cấu hình SEO<i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a>
      <ul class="sub">
        <li><a name="c_seo" href="<?=base_url()?>backend/c_seo/ListCode">Code header & tracking</a></li>
      </ul>
    </li>
    <?php if($this->session->userdata('User_Group')==2) { ?>
    <li>
      <a class="has-sub" href="#!"><i class="fa fa-users" aria-hidden="true"></i>Quản lý thành viên<i class="fa fa-chevron-down pull-right" aria-hidden="true"></i></a>
      <ul class="sub">
        <li><a name="c_admin" href="<?=base_url()?>backend/c_admin/ListUser">Danh sách thành viên</a></li>
      </ul>
    </li>
    <?php } ?>
  </ul>
</div>


<?php 
  $key = $this->uri->segment(2);
?>
<script type="text/javascript">
  $(document).ready(function(){
    $(".sidebar .sub").hide();
      $(".sidebar .has-sub").click(function(){
        $(this).parent().children(".sub").addClass("active");
        $(".sidebar .sub:not(.active)").slideUp(200);
        $(this).parent().children(".sub").slideToggle(200);
        $(this).parent().children(".sub").removeClass("active");
      });
    $('.sidebar ul li a[name~="<?=$key?>"]').parent().parent().show();
    //$('.sidebar ul li a[name~="<?=$key?>"]').css('color','red');
  });
</script>
