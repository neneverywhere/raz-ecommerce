<?=$editor?>
<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Sản phẩm</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_product/ListProduct" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-news-catalog">
      <form id="frm-gal" class="form-horizontal" action="<?=base_url()?>backend/c_product/AddProduct" method="post">

        <div class="form-group">
          <label class="col-sm-2 control-label">Danh mục</label>
          <div class="col-sm-10">
            <select id="productparent" name="productparent">
              <option value="0"></option>
              <?php foreach ($parent as $row) { ?>
              <option value="<?=$row['Product_Catalog_ID']?>"><?=$row['Product_Catalog_Name']?></option>
              <?php } ?>
            </select>
            <span id="productchild"></span>
          </div>
        </div>

        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input name="name" type="text" class="form-control" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Mã sản phẩm</label>
          <div class="col-sm-10">
            <input name="code" type="text" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Hình ảnh</label>
          <div class="col-sm-10">
            <input id="image" type="text" name="image" value="" class="form-control">
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
            <img id="sideimage" class="pull-right fancybox" src="<?=base_url()?>public/backend/images/no-image.png" width="100" alt="">
          </div>
        </div>
        
        <div id="pgal" class="pgal"></div>
        <a id="addgal" class="addgal"><i class="fa fa-plus" aria-hidden="true"></i>Click to add gallery</a>

        <div class="form-group mgt50 hidden">
          <label class="col-sm-2 control-label">Giá ban đầu (nếu có *)<br> <span>x 1000</span></label>
          <div class="col-sm-10">
            <input name="price-before" type="text" class="form-control">
          </div>
        </div>

        <div class="form-group mgt50">
          <label class="col-sm-2 control-label">Giá<br> <span>x 1000</span></label>
          <div class="col-sm-10">
            <input name="price" type="text" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <input type="radio" name="status" value="1" checked>Hiện<br>
            <input type="radio" name="status" value="0"> Ẩn
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Hot</label>
          <div class="col-sm-10">
            <input type="radio" name="hot" value="1">True<br>
            <input type="radio" name="hot" value="0" checked> False
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Tóm tắt</label>
          <div class="col-sm-10">
            <textarea name="des" class="form-control" rows="3"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Bài viết</label>
          <div class="col-sm-10">
            <textarea id="content" name="content" rows="15"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Tiêu đề</label>
          <div class="col-sm-10">
            <input name="title" type="text" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Từ khóa</label>
          <div class="col-sm-10">
            <input name="keyword" type="text" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
            <textarea name="description" class="form-control" rows="3"></textarea>
          </div>
        </div>

        <!-- Form actions -->
        <div class="form-group">
          <div class="col-sm-12 text-center">
            <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            <button type="reset" class="btn btn-danger">Làm lại</button>
          </div>
        </div>
      </form>
    </div>
  </div>          
</div>

<script>
// Hiển thị hộp select danh mục cấp 2 khi đã click chọn danh mục cấp 1
$(document).ready(function(){
    $("#productparent").change(function(){
    var idparent=$(this).val();
    $('#productchild').empty();
    $("#productchild").load('<?=base_url()?>backend/c_product/getproductchild/'+idparent);
    });
});

$(document).ready(function(){
  $c = 0;
  $("#addgal").click(function(){
    $c= $c+1;
    $a = '<div class="test form-group"><label class="col-sm-2 control-label">Image'+$c+'</label><div class="col-sm-10"><input id="image'+$c+'" type="text" name="item[]" value="" class="form-control"><a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image'+$c+'&relative_url=1" class="btn selectgal iframe-btn" type="button">Select</a><a class="removegal btn" href="#!">Remove</a><img id="sideimage'+$c+'" class="pull-right fancybox" height="70" alt=""><div class="clearfix"></div></div></div>'; //add input when click addgal
    $("#pgal").append($a);
    $(".removegal").click(function(){
      $(this).parent().parent().remove(); // remove input when click remove
    }); 
  });
});
</script>
