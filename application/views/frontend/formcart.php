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
    <div class="cart">
      <div class="container">
        <h1>Giỏ hàng</h1>
        <hr>
        <?php 
          $cart = $this->cart->contents();
          $num = count($cart);
          if ($num>0){
        ?>

          <table id="tablecart" class="table table-bordered table-condensed table-striped table-responsive">
            <thead>
              <tr class="success">
                <th class="text-center">STT</th>
                <th width="40%">Tên SP</th>
                <th width="10%">Mã SP</th>
                <th width="5%">Hình</th>
                <th width="10%">Số lượng</th>
                <th width="10%">Đơn giá</th>
                <th width="15%">Tổng</th>
                <th width="5%">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $i = 1;
              $cart = $this->cart->contents();
              $sum=0;
              foreach ($cart as $item) { 
            ?>
              <tr>
                <td class="text-center"><strong><?=$i++?></strong></td>
                <td class="bold"><?=$item['name']?></td>
                <td></td>
                <td class="text-center">
                  <?php $image =  $item['options'];
                        $image = $image[0];
                  ?>
                  <a class="fancybox" href="<?=$image?>"><img data-toggle="tooltip" data-placement="top" title="Click để phóng to" height="50" src="<?=$image?>" alt=""></a>
                </td>
                <td>
                  <input id="<?=$item['rowid']?>" class="form-control updateitem text-center" name="num" price="<?=$item['price']?>" type="number" value="<?=$item['qty']?>">
                </td>
                <td class="red bold"><?=number_format($item['price'])?> Đ</td>
                <td class="red bold"><?=number_format($item['subtotal'])?> Đ</td>
                <?php $sum = $sum + $item['subtotal']?>
                <td><button name="<?=$item['rowid']?>" type="button" class="btn btn-danger removeitem"><i class="fa fa-times" aria-hidden="true"></i></button></td>
              </tr>
            <?php } ?>
              <tr class="info">
                <td></td>
                <td style="color: blue;font-weight: bold;">Tổng tiền đơn hàng: </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="color: red;font-weight: bold;"><?=number_format($sum)?> Đ</td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <div class="text-center do">
            <a data-toggle="tooltip" data-placement="top" title="Quay về trang chủ và tiếp tục mua hàng"  href="<?=base_url()?>" type="button" class="btn btn-primary">Tiếp tục mua</a>
            <a type="button" id="removeall" class="btn btn-danger">Xóa giỏ hàng</a>
            <a href="<?=base_url()?>dat-hang" type="button" class="btn btn-success">Đặt đơn hàng</a>
          </div>

        <?php }else{ ?>
          <label>Giỏ hàng rỗng</label>
        <?php } ?>
      </div>
    </div>
  </main>

  <?=$this->load->view('frontend/_footer')?>


  <nav id="menu-mobi">
    <ul><!-- Đoạn này đã dùng jquery đổ menu ở trên vào, nên để nguyên thế này, ko xóa thẻ ul -->
    </ul>
  </nav>
</div>

<script type="text/javascript">
  // Chuyển hướng xóa giỏ hàng
  $(document).ready(function(){
      $("#removeall").click(function(){
        var host = window.location.origin;
        $.confirm({
          icon: 'fa fa-trash-o',
          title: 'Xóa giỏ hàng!!!',
          closeIcon: true,
          theme: 'dark',
          content: 'Bạn có chắn chắn muốn xóa giỏ hàng không?',
          buttons: {
            Ok: function () {
              $('#tablecart').empty();
              $("#tablecart").load(host+'/frontend/c_cart/Remove/all');
              //window.location=host;
              $('.cartalert .label').remove();
            },
            cancel: function () {
            }
          }
        });

      });
  });

  // Chuyển hướng xóa 1 item trong giỏ hàng
  $(document).ready(function(){
    $(".removeitem").click(function(){
      $rowid = $(this).attr('name');
      var host = window.location.origin;
      $.confirm({
        title: '',
        theme: 'dark',
        closeIcon: true,
        content: 'Bạn muốn xóa sản phẩm này khỏi giỏ hàng?',
        buttons: {
          Ok: function () {
            $('#tablecart').empty();
            $("#tablecart").load(host+'/frontend/c_cart/Remove/'+$rowid);
            var s = $('#cartalert .label').attr('name');
            var size = s-1;
            $('.cartalert .label').text(size);
          },
          cancel: function () {
          }
        }
      });
    });
  });

  //update item trong giỏ hàng
  $(document).ready(function(){
    $('input.updateitem').change(function() {
      var host = window.location.origin;
      var id = $(this).attr('id');
      var price = $(this).attr('price');
      var qty = $(this).val();
      $('#tablecart').empty();
      $("#tablecart").load(host+'/frontend/c_cart/Update/'+id+'/'+qty);
    });
  });

</script>

</body>
</html>