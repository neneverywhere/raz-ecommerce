<div class="list-news-catalog gallery">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Gallery</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_gallery/ListGallery" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-gallery">
      <form id="frm-gal" class="form-horizontal" action="<?=base_url()?>backend/c_gallery/AddGallery" method="post">
        <div class="form-group">
          <div class="col-sm-12 text-center clearfix">
            <button type="submit" name="submit" class="btn btn-primary pull-left"><i class="fa fa-floppy-o" aria-hidden="true"></i>Save</button>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input name="name" type="text" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Hình ảnh</label>
          <div class="col-sm-10">
            <input id="image" type="text" name="image" value="" class="form-control">
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
            <img id="sideimage" class="pull-right fancybox" src="<?=base_url()?>public/backend/images/no-image.png" height="70" alt="">
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
          <label class="col-sm-2 control-label">Tóm tắt</label>
          <div class="col-sm-10">
            <textarea name="des" class="form-control" rows="3"></textarea>
          </div>
        </div>
      </form>
      <a id="addgal" class="addgal"><i class="fa fa-plus" aria-hidden="true"></i>Click to add gallery</a>
    </div>
  </div>          
</div>

<script type="text/javascript">
  $(document).ready(function(){
      $c = 0;
      $("#addgal").click(function(){
        $c= $c+1;
        $a = '<div class="test form-group"><label class="col-sm-2 control-label">Image'+$c+'</label><div class="col-sm-10"><input id="image'+$c+'" type="text" name="item[]" value="" class="form-control"><a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image'+$c+'&relative_url=1" class="btn selectgal iframe-btn" type="button">Select</a><a class="removegal btn" href="#!">Remove</a><img id="sideimage'+$c+'" class="pull-right fancybox" height="70" alt=""><div class="clearfix"></div></div></div>'; //add input when click addgal
        $("#frm-gal").append($a);
        $(".removegal").click(function(){
          $(this).parent().parent().remove(); // remove input when click remove
        }); 
      });

  });
</script>