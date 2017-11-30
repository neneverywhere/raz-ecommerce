<!DOCTYPE html>
<html lang="en">
<?=$this->load->view('frontend/_head')?>
<body>

<div class="page">
  <div class="header-mobi">
    <a href="#menu-mobi"><i class="fa fa-bars fa-2x"></i></a>
  </div>

  <?=$this->load->view('frontend/_header')?>

  <div class="book">
    <div class="container">
      <h2>Sản phẩm đã chọn</h2>
      <table id="tablebook" class="table table-striped table-bordered table-condensed table-responsive table-hover">
        <thead>
          <th class="text-center">STT</th>
          <th>Tên</th>
          <th class="text-center">Số lượng</th>
          <th>Đơn giá</th>
          <th>Tổng</th>
        </thead>
        <tbody>
          <?php 
            $i = 1;
            $cart = $this->cart->contents();
            $sum=0;
            foreach ($cart as $item) { 
          ?>
            <tr>
              <td class="text-center"><?=$i++?></td>
              <td class="bold"><?=$item['name']?></td>
              <td class="text-center"><?=$item['qty']?></td>
              <td class="red bold"><?=number_format($item['price'])?> Đ</td>
              <td class="red bold"><?=number_format($item['subtotal'])?> Đ</td>
              <?php $sum = $sum + $item['subtotal']?>
            </tr>
          <?php } ?>
          <tr class="info">
            <td></td>
            <td style="color: blue;font-weight: bold;">Tổng tiền đơn hàng: </td>
            <td></td>
            <td></td>
            <td style="color: red;font-weight: bold;"><?=number_format($sum)?> Đ</td>
          </tr>
        </tbody>
      </table>
      <hr>
      <h2 class="text-center">Form đặt hàng</h2>
      <p class="text-center">Vui lòng điền đầy đủ thông tin vào form sau để chúng tôi có thể liên hệ và giao hàng trong thời gian sớm nhất.</p>
      <p class="text-center">Lưu ý: Những trường có cấu * là bắt buộc phải nhập. Xin cám ơn.</p>
      <div class="frm-order">
        <form id="sendorder" action="<?=base_url()?>frontend/c_book/Order" method="post" class="well col-sm-12 col-md-12">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <label>Họ tên *</label>
              <input name="name" class="form-control" placeholder="Họ tên" type="text" required>
              <label>Số phone *</label>
              <input name="phone" class="form-control" placeholder="Phone" type="text" required>
              <label>Email</label>
              <input name="email" class="form-control" placeholder="Email" type="text"> 
              <label>Địa chỉ</label>
              <input name="address" class="form-control" placeholder="Địa chỉ" type="text">
            </div>
      
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label>Lời nhắn</label> 
                <textarea class="col-sm-3 col-md-3 form-control" name="content" rows="12"></textarea>
                <button class="btn btn-success pull-right" type="submit">Đặt hàng</button>
              </div>
            </div>            
          </div>
        </form>
      </div>
    </div>
  </div>

  <?=$this->load->view('frontend/_footer')?>


  <nav id="menu-mobi">
    <ul><!-- Đoạn này đã dùng jquery đổ menu ở trên vào, nên để nguyên thế này, ko xóa thẻ ul -->
    </ul>
  </nav>
</div>


<!-- Spinner -->
<div id="loader" class="loader text-center">
  <div class="spinner">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
  </div>
  <p>Đang thực hiện gửi mail đặt hàng, xin vui lòng đợi trong vài giây!!!</p>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $( "#sendorder" ).submit(function() {
        $('#loader').css('display','block');
    });    
  });
</script>

</body>
</html>