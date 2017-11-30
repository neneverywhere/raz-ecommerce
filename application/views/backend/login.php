<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('backend/_head.php'); ?>
<style type="text/css">
  body{
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
  }
</style>
<body>
  <main>
    <p style="margin: 10px 20px 0 0;" class="text-right"><a style="color: white" href="/"><i style="margin-right: 10px" class="fa fa-power-off" aria-hidden="true"></i>Thoát về trang chủ</a></p>
    <p style="margin: 10px 20px 0 0;" class="text-right"><a style="color: white" href="<?=base_url()?>backend/c_admin/register"><i style="margin-right: 10px" class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký tài khoản</a></p>

    <div class="login">
      <h1>Đăng nhập</h1>

      <?php if (isset($error)) { ?>
      <p class="error"> * <?=$error?></p>
      <?php } ?>

      <form class="form-horizontal" action="<?=base_url()?>backend/c_admin/CheckLogin" method="post">
        <div class="form-group row">
          <label class="col-sm-3 control-label">Email</label>
          <div class="col-sm-6">
          <input name="email" type="text" class="form-control" value="" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Password</label>
          <div class="col-sm-6">
          <input name="password" minlength="6" type="password" class="form-control" value="" required>
          </div>
        </div>
        <!-- Action -->
        <div class="form-group">
          <div class="col-sm-12 text-center">
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </main>
  <?php $this->load->view('backend/_footer.php'); ?>
</body>
<script>
  $(document).ready(function(){
    $height = $(window).height();
    $('html').css('height',$height);
  });
</script>
</html>