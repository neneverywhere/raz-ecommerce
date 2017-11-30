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
    <div class="thanks">
      <div class="container">
        <h1>Gửi mail thành công</h1>
        <hr>
        <p>Cám ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ lắng nghe yêu cầu và phản hồi lại trong thời gian sớm nhất!</p>
        <p>Nhấp vào <a href="/">đây</a> để quay trở lại trang chủ.</p>
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