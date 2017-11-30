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
    <div class="wrapper">
      <div class="slider">
      <?php foreach ($slider as $slider) { ?>
        <img src="<?=$slider['Slider_Image']?>" alt="">
      <?php } ?>
      </div>

      <div class="home-catalog">
        <div class="container">
          <div id="home-gallery" class="home-gallery text-center">
          <?php foreach ($catalog as $catalog) { ?>
            <a href="<?=base_url()?><?=$catalog['Product_Catalog_Link']?>">
              <img alt="<?=$catalog['Product_Catalog_Name']?>" src="<?=$catalog['Product_Catalog_Image']?>"/>
            </a>
          <?php } ?>
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