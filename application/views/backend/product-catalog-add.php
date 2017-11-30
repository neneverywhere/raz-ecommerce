<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Danh mục sản phẩm</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_product_catalog/ListProductCatalog" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-news-catalog">
      <form class="form-horizontal" action="<?=base_url()?>backend/c_product_catalog/AddProductCatalog" method="post">
        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input id="name" name="name" type="text" class="form-control" required>
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

        <div class="form-group">
          <label class="col-sm-2 control-label">Tóm tắt</label>
          <div class="col-sm-10">
            <textarea name="des" class="form-control" rows="3"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Thứ tự</label>
          <div class="col-sm-10">
            <input id="order" name="order" type="text" class="form-control">
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
            <input type="radio" name="hot" value="0" checked>False<br>
            <input type="radio" name="hot" value="1"> True
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Danh mục cha</label>
          <div class="col-sm-10">
            <select name="parent" class="selectpicker" title="Chọn mục cha">
            <option value="0">---</option>
            <?php foreach ($parent as $parent) { ?>
              <option value="<?=$parent['Product_Catalog_ID']?>"><?=$parent['Product_Catalog_Name']?></option>
            <?php } ?>
            </select>
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
