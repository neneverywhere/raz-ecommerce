<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Danh mục dự án</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_project_catalog/ListProjectCatalog" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
      </div>
    </div>
    <div class="panel-body add-news-catalog">
      <form class="form-horizontal" action="<?=base_url()?>backend/c_project_catalog/EditProjectCatalog/<?=$DetailProjectCatalog['Project_Catalog_ID']?>" method="post">
        <!-- Name input-->
        <div class="form-group">
          <label class="col-sm-2 control-label">Tên</label>
          <div class="col-sm-10">
            <input id="name" name="name" type="text" class="form-control" value="<?=$DetailProjectCatalog['Project_Catalog_Name']?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Tóm tắt</label>
          <div class="col-sm-10">
            <textarea name="des" class="form-control" rows="3"><?=$DetailProjectCatalog['Project_Catalog_Des']?></textarea>
          </div>
        </div>


        <!--<div class="form-group">
          <label class="col-sm-2 control-label">Liên kết</label>
          <div class="col-sm-10">
            <input id="link" name="link" type="text" class="form-control" value="<?=$detail['News_Catalog_Link']?>">
          </div>
        </div>-->

        <div class="form-group">
          <label class="col-sm-2 control-label">Thứ tự</label>
          <div class="col-sm-10">
            <input id="order" name="order" type="text" class="form-control" value="<?=$DetailProjectCatalog['Project_Catalog_Order']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <input <?php echo (($DetailProjectCatalog['Project_Catalog_Status']) ==1)? "checked":"" ?> type="radio" name="status" value="1" >Hiện<br>
            <input <?php echo (($DetailProjectCatalog['Project_Catalog_Status']) ==0)? "checked":"" ?> type="radio" name="status" value="0"> Ẩn
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Tiêu đề</label>
          <div class="col-sm-10">
            <input name="title" type="text" class="form-control" value="<?=$DetailProjectCatalog['Project_Catalog_Title']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Từ khóa</label>
          <div class="col-sm-10">
            <input name="keyword" type="text" class="form-control" class="<?=$DetailProjectCatalog['Project_Catalog_Keyword']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
            <textarea name="description" class="form-control" rows="3"><?=$DetailProjectCatalog['Project_Catalog_Description']?></textarea>
          </div>
        </div>

        <!--<div class="form-group">
          <label class="col-sm-2 control-label">Mục cha</label>
          <div class="col-sm-10">
            <select>
              <option value="volvo"></option>
              <option value="saab">Saab</option>
              <option value="opel">Opel</option>
              <option value="audi">Audi</option>
            </select>
          </div>
        </div>-->

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
