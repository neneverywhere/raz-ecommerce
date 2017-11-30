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
    <div class="news">
      <div class="container">
        <div class="row">
          <div class="main col-xs-12 col-md-9">
            <h1><?=$DetailNews['News_Name']?></h1>
            <p class="date"><i class="fa fa-calendar" aria-hidden="true"></i>
              <?php 
                $date = new DateTime($DetailNews['News_Date']);
                echo $date->format('d/m/Y'); // Hiển thị ngày tháng dạng d/m/Y
              ?>
            </p>
            <div class="content">
              <?=$DetailNews['News_Content']?>
           </div>
          </div>
          <div class="col-xs-12 col-md-3 sidebar-news">
            <div class="item">
              <h3>Tin liên quan</h3>
              <ul class="list-unstyled">
              <?php foreach ($sidebar['news'] as $news) { ?>
                <?php if($news['News_ID']!=$DetailNews['News_ID']) { ?>
                  <li><a href="<?=$news['News_Link']?>">
                    <?=$news['News_Name']?>
                    <i>
                      <?php 
                        $date = new DateTime($news['News_Date']);
                        echo '('.$date->format('d/m/Y').')'; // Hiển thị ngày tháng dạng d/m/Y
                      ?>
                    </i></a>
                  </li>
                <?php } ?>
              <?php } ?>
              </ul>
            </div>
            <hr>
            <div class="item catalog">
              <h3>Danh mục tin</h3>
              <ul class="list-unstyled">
              <?php foreach ($sidebar['catalog'] as $catalog) { ?>
                <li><a href="<?=$catalog['News_Catalog_Link']?>"><?=$catalog['News_Catalog_Name']?></a></li>
              <?php } ?>
              </ul>
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