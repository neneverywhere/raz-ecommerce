<div class="list-news-catalog gallery">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Gallery</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_gallery/ListGallery" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-gallery">
      <form id="frm-gal" class="form-horizontal" action="<?=base_url()?>backend/c_gallery/UpdateGallery/<?=$DetailGallery['Gallery_ID']?>" method="post">
        <div class="form-group">
          <div class="col-sm-12 text-center clearfix">
            <button type="submit" name="submit" class="btn btn-primary pull-left"><i class="fa fa-floppy-o" aria-hidden="true"></i>Save</button>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input name="name" type="text" class="form-control" value="<?=$DetailGallery['Gallery_Name']?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Hình ảnh</label>
          <div class="col-sm-10">
            <input id="image" type="text" name="image" value="<?=$DetailGallery['Gallery_Image']?>" class="form-control">
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
            <img id="sideimage" class="pull-right fancybox" height="70" alt=""
              <?php 
                if($DetailGallery['Gallery_Image']!='') echo 'src'.'='.'"'. $DetailGallery['Gallery_Image'].'"';
                else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
              ?>
            >
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailGallery['Gallery_Status']) ==1)? "checked":"" ?> type="radio" name="status" value="1">Hiện<br>
            <input <?php echo (($DetailGallery['Gallery_Status']) ==0)? "checked":"" ?> type="radio" name="status" value="0"> Ẩn
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tóm tắt</label>
          <div class="col-sm-10">
            <textarea name="des" class="form-control" rows="3"><?=$DetailGallery['Gallery_Des']?></textarea>
          </div>
        </div>
        <?php
          if($DetailGallery['Gallery_Content']!=''){
          $items = explode(',', $DetailGallery['Gallery_Content']);
          $citems = count($items);
          foreach ($items as $item) {
        ?>
        <div class="test form-group">
          <label class="col-sm-2 control-label">Image <?=array_search($item, $items)+1?></label>
          <div class="col-sm-10"><input id="image<?=array_search($item, $items)?>" type="text" name="item[]" class="form-control" value="<?=$item?>">
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image<?=array_search($item, $items)?>&relative_url=1" class="btn selectgal iframe-btn" type="button">Select</a>
            <a class="removegal btn" href="#!">Remove</a>
            <img id="sideimage<?=array_search($item, $items)?>" class="pull-right fancybox" height="70" alt="" src="<?=$item?>">
            <div class="clearfix"></div>
          </div>
        </div>
        <?php }}else $citems=0 ?>
        <hr style="border-color: #dce775; border-style: dashed;">
      </form>
      <a id="addgal" class="addgal"><i class="fa fa-plus" aria-hidden="true"></i>Click to add image</a>
    </div>
  </div>          
</div>

<script type="text/javascript">
  $(document).ready(function(){
      $c = <?=$citems?>;
      $("#addgal").click(function(){
        $c= $c+1;
        $a = '<div class="test form-group"><label class="col-sm-2 control-label">Image'+$c+'</label><div class="col-sm-10"><input id="image'+$c+'" type="text" name="item[]" value="" class="form-control"><a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image'+$c+'&relative_url=1" class="btn selectgal iframe-btn" type="button">Select</a><a class="removegal btn" href="#!">Remove</a><img id="sideimage'+$c+'" class="pull-right fancybox" height="70" alt=""><div class="clearfix"></div></div></div>'; //add input when click
        $("#frm-gal").append($a);
        $(".removegal").click(function(){
          $(this).parent().parent().remove(); // remove input when click remove
        }); 
      });

      $(".removegal").click(function(){
        $(this).parent().parent().remove(); // remove input when click remove
      }); 

  });
</script>