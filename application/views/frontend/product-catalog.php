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
    <div class="product-catalog">
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
            <div class="webcrumbs hidden-xs">
              <ul class="list-unstyled list-inline">
                <li><a href="/">Trang chủ</a></li>
                <?php foreach ($webcrumb as $webcrumb) { ?>
                  <li><a href="<?=$webcrumb['link']?>"><?=$webcrumb['name']?></a></li>
                <?php } ?>
              </ul>
            </div>
            <div class="list-product">
              <div class="row">
              <?php foreach ($ListProduct as $ListProduct) { ?>
                <div class="col-xs-12 col-sm-6 col-md-3 item">
                  <div class="img">
                    <a href="<?=$ListProduct['Product_Link']?>">
                    <?php 
                      $gallery = $ListProduct['Product_Gallery'];
                      $gallery = explode(',', $gallery);
                      if($gallery[0]!='') $gallery = $gallery[0];
                      else $gallery = $ListProduct['Product_Image'];
                    ?>
                      <img data-src="<?=$gallery?>" src="<?=$ListProduct['Product_Image']?>" alt="<?=$ListProduct['Product_Name']?>">
                    </a>
                  </div>
                  <div class="des">
                    <p class="name bold"><a href="<?=$ListProduct['Product_Link']?>"><?=$ListProduct['Product_Name']?></a></p>
                    <p class="price bold"><?=number_format($ListProduct['Product_Price'],0,',','.')?> VNĐ</p>
                  </div>
                </div>
              <?php } ?>
              </div>
              <div class="pagi"><?=$pagination?></div>
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