<?=$editor?>
<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Dự án</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_project/ListProject" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-news-catalog">
      <form class="form-horizontal" action="<?=base_url()?>backend/c_project/EditProject/<?=$DetailProject['Project_ID']?>" method="post">

        <?php $listcat = $this->m_project->ListProjectCatalog(); ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Danh mục</label>
          <div class="col-sm-10">
            <select name="parent">
              <option value="<?=$DetailProject['Project_Catalog_ID']?>"><?=$this->m_project->GetNameCatalog($DetailProject['Project_Catalog_ID'])?></option>
              <option value="0"></option>
              <?php foreach ($listcat as $row) { ?>
              <option value="<?=$row['Project_Catalog_ID']?>"><?=$row['Project_Catalog_Name']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input name="name" type="text" class="form-control" value="<?=$DetailProject['Project_Name']?>" required>
          </div>
        </div>

        <!--<div class="form-group">
          <label class="col-sm-2 control-label">Liên kết</label>
          <div class="col-sm-10">
            <input name="link" type="text" class="form-control">
          </div>
        </div>-->

        <div class="form-group">
          <label class="col-sm-2 control-label">Hình ảnh</label>
          <div class="col-sm-10">
            <input id="image" type="text" name="image" value="<?=$DetailProject['Project_Image']?>" class="form-control">
            <a href="<?=base_url()?>filemanager/dialog.php?type=1&field_id=image&relative_url=1" class="btn iframe-btn" type="button">Select</a>
            <img id="sideimage" class="pull-right fancybox" height="70" alt=""
              <?php 
                if($DetailProject['Project_Image']!='') echo 'src'.'='.'"'. $DetailProject['Project_Image'].'"';
                else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
                // Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
              ?>
            >
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailProject['Project_Status']) ==1)? "checked":"" ?> type="radio" name="status" value="1">Hiện<br>
            <input <?php echo (($DetailProject['Project_Status']) ==0)? "checked":"" ?> type="radio" name="status" value="0"> Ẩn
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Hot</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailProject['Project_Hot']) ==1)? "checked":"" ?> type="radio" name="hot" value="1">True<br>
            <input <?php echo (($DetailProject['Project_Hot']) ==0)? "checked":"" ?> type="radio" name="hot" value="0"> False
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Tóm tắt</label>
          <div class="col-sm-10">
            <textarea name="des" class="form-control" rows="3"><?=$DetailProject['Project_Des']?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Bài viết</label>
          <div class="col-sm-10">
            <textarea id="content" name="content" rows="15">
              <?=$DetailProject['Project_Content']?>
            </textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Tiêu đề</label>
          <div class="col-sm-10">
            <input name="title" type="text" class="form-control" value="<?=$DetailProject['Project_Title']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Từ khóa</label>
          <div class="col-sm-10">
            <input name="keyword" type="text" class="form-control" value="<?=$DetailProject['Project_Keyword']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
            <textarea name="description" class="form-control" rows="3"><?=$DetailProject['Project_Description']?></textarea>
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
