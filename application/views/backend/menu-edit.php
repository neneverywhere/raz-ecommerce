<div class="list-menu">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Menu</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_menu/ListMenu" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-slideshow">
      <form class="form-horizontal" action="<?=base_url()?>backend/c_menu/EditMenu/<?=$DetailMenu['Menu_ID']?>" method="post">
        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input id="name" name="name" type="text" class="form-control" value="<?=$DetailMenu['Menu_Name']?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Liên kết</label>
          <div class="col-sm-10">
            <input id="link" name="link" type="text" class="form-control" value="<?=$DetailMenu['Menu_Link']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Icon</label>
          <div class="col-sm-10">
            <input id="image" type="text" name="image" value="" class="form-control" value="<?=$DetailMenu['Menu_Icon']?>">
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
            <img id="sideimage" class="pull-right fancybox" height="100" alt=""
              <?php 
                if($DetailMenu['Menu_Icon']!='') echo 'src'.'='.'"'. $DetailMenu['Menu_Icon'].'"';
                else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
                // Nếu có Hình thì hiện Hình, ko có thì hiện hình no img
              ?>
            >
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Thứ tự</label>
          <div class="col-sm-10">
            <input id="order" name="order" type="text" class="form-control" value="<?=$DetailMenu['Menu_Order']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailMenu['Menu_Status']) ==1)? "checked":"" ?> type="radio" name="status" value="1" >Hiện<br>
            <input <?php echo (($DetailMenu['Menu_Status']) ==0)? "checked":"" ?> type="radio" name="status" value="0"> Ẩn
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Target</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailMenu['Menu_Target']) == '')? "checked":"" ?> type="radio" name="target" value="" >Normal<br>
            <input <?php echo (($DetailMenu['Menu_Target']) == 'blank')? "checked":"" ?> type="radio" name="target" value="_blank"> Blank
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Mục cha</label>
          <div class="col-sm-10">
            <select name="parent" id="parent">
              <?php
                $parenttwo = $DetailMenu['Menu_Parent_ID'];
                if ($parenttwo != 0) { $ListMenuTwo = $this->m_menu->GetNameParent($parenttwo);
              ?>
              <option value="<?=$ListMenuTwo['Menu_ID']?>">
                <?php 
                  if(($ListMenuTwo['Menu_Parent_ID'])!=0) {
                    $a = $this->m_menu->GetNameParent($ListMenuTwo['Menu_Parent_ID']);
                    echo $a['Menu_Name'].'/'.$ListMenuTwo['Menu_Name'];
                  }else echo $ListMenuTwo['Menu_Name'];
                ?>
              </option>
              <?php } ?>
              <option value="0"></option>
              <?php foreach ($ListMenuOne as $row) { ?>
              <option value="<?=$row['Menu_ID']?>"><?=$row['Menu_Name']?></option>
              <?php $ListMenuTwo =  $this->m_menu->ListMenuTwo($row['Menu_ID'])?>
                <?php foreach ($ListMenuTwo as $row2) { ?>
                  <option value="<?=$row2['Menu_ID']?>"><?=$row['Menu_Name']?>/<?=$row2['Menu_Name']?></option>  
                <?php } ?>
              <?php } ?>
            </select>
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
