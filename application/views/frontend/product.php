<!DOCTYPE html>
<html lang="en">
<?=$this->load->view('frontend/_head')?>
<body>

<div class="page">
  <div class="header-mobi">
    <a href="#menu-mobi"><i class="fa fa-bars fa-2x"></i></a>
  </div>

  <?=$this->load->view('frontend/_header')?>

  <main>
    <div class="product">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-2 hidden-xs hidden-sm">
            <div class="sidebar" data-spy="affix" data-offset-top="78">
              <ul class="list-unstyled">
              <?php foreach ($sidebar as $sidebar) { ?>
                <li class="has-sub">
                  <a 
                  <?php if($sidebar['child']==array()) echo 'href="'.base_url().$sidebar['Product_Catalog_Link'].'"'?>>
                    <?=$sidebar['Product_Catalog_Name']?>
                    <?php if($sidebar['child']!=array()) { ?>
                      <i class="fa fa-plus" aria-hidden="true"></i>
                    <?php } ?>
                  </a>
                  <?php if($sidebar['child']!=array()) { ?>
                  <ul class="list-unstyled sub">
                  <?php foreach ($sidebar['child'] as $child) { ?>
                    <li><a href="<?=base_url().$child['Product_Catalog_Link']?>"><?=$child['Product_Catalog_Name']?></a></li>
                  <?php } ?>
                  </ul>
                  <?php } ?>
                </li>
              <?php } ?>
              </ul>
            </div>
          </div>
          <div class="main col-xs-12 col-md-10">
            <div class="webcrumbs hidden-xs hidden-sm">
              <ul class="list-unstyled list-inline">
                <li><a href="/">Trang chủ</a></li>
                <?php foreach ($webcrumb as $webcrumb) { ?>
                  <li><a <?php if($webcrumb['link']!='') { ?> href="<?=$webcrumb['link']?>" <?php } ?>><?=$webcrumb['name']?></a></li>
                <?php } ?>
              </ul>
            </div>
            <div class="content">
              <div class="row">
                <div class="col-xs-12 col-sm-4 img">
                  <div class="large text-center">
                    <a data-toggle="tooltip" title="Click để phóng to" data-placement="left" class="fancybox" rel="gallery" href="<?=$DetailProduct['Product_Image']?>"><img src="<?=$DetailProduct['Product_Image']?>" alt=""></a>
                  </div>
                  <div class="thumb clearfix">
                    <a><img src="<?=$DetailProduct['Product_Image']?>" alt=""></a>
                  <?php 
                    $gallery = $DetailProduct['Product_Gallery'];
                    $gallery = explode(',', $gallery);
                    foreach ($gallery as $gallery) {
                  ?>
                    <a><img src="<?=$gallery?>" alt=""></a>
                  <?php } ?>
                  </div>
                </div>
                <div class="des col-xs-12 col-sm-8">
                  <h1 class="name"><?=$DetailProduct['Product_Name']?></h1>
                  <p class="price">Giá: <span><?=number_format($DetailProduct['Product_Price'],0,',','.')?> VNĐ</span></p>
                  <div class="caption">
                    <?=$DetailProduct['Product_Content']?>
                  </div>
                  <div class="plus text-center">
                    <a href="<?=base_url()?>gio-hang/themsp/<?=$DetailProduct['Product_ID']?>/<?=$DetailProduct['Product_Price']?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mua hàng</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="similar-product">
              <h2>Sản phẩm cùng loại</h2>
              <div class="list">
              <?php foreach ($similar as $similar) { ?>
                <?php if($similar['Product_ID']!=$DetailProduct['Product_ID']) { ?>
                  <div class="item"><a href="<?=$similar['Product_Link']?>"><img src="<?=$similar['Product_Image']?>" alt=""></a></div>
                <?php } ?>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?=$this->load->view('frontend/_footer')?>


  <nav id="menu-mobi">
    <ul><!-- Đoạn này đã dùng jquery đổ menu ở trên vào, nên để nguyên thế này, ko xóa thẻ ul -->
    </ul>
  </nav>
</div>

</body>
</html>