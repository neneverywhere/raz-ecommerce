<div class="list-news-catalog">
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <span>Dự án</span>
      <div class="pull-right">
        <a href="<?=base_url()?>backend/c_project/ListProject" class="plus"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
        <a class="plus" href="<?=base_url()?>backend/c_project/AddProject"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
      </div>
    </div>

    <div class="filter">
      <!-- form filter -->
      <form class="form-inline" method="post" action="<?=base_url()?>backend/c_filter/FillProject">
        <div class="form-group">
          <select name="catalog" class="form-control selectpicker show-tick" title="<?=$Catalog?>" data-live-search="true" data-width="250px">
            <option value="">Tât cả</option>
            <?php
              $parent = $this->m_project->ListProjectCatalog();
              foreach ($parent as $row) { 
            ?>
              <option value="<?=$row['Project_Catalog_ID']?>"><?=$row['Project_Catalog_Name']?></option>
            <?php } //foreach parent?>
          </select>
        </div>
        <div class="form-group">
          <input name="name" class="form-control" type="text" placeholder="Tên" value="<?=$Name?>">
        </div>
        <div class="form-group">
          <select name="hot" class="form-control selectpicker show-tick" title="Nổi bật" data-width="100px">
            <option value="">Tât cả</option>
            <option value="0">False</option>
            <option value="1">True</option>
          </select>
        </div>
        <div class="form-group">
          <select name="status" class="form-control selectpicker show-tick" title="Status" data-width="100px">
            <option value="">Tât cả</option>
            <option value="0">Ẩn</option>
            <option value="1">Hiện</option>
          </select>
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit" class="form-control"><strong>Lọc</strong></button>
        </div>
      </form>
      <!-- form -->
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="10%">Danh mục</th>
          <th width="25%">Tên</th>
          <th width="20%">Liên kết</th>
          <th width="10%">Image</th>
          <th width="10%">Nổi bật</th>
          <th width="10%">Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i=1;
      foreach ($ListProject as $row) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$this->m_project->GetNameCatalog($row['Project_Catalog_ID'])?></td>
          <td><?=$row['Project_Name']?></td>
          <td><?=$this->m_project->GetLinkCatalog($row['Project_Catalog_ID'])?>/<?=$row['Project_Alias']?>.html</td>
          <td><img class="fancybox" height="50" alt=""
              <?php 
                if($row['Project_Image']!='') echo 'src'.'='.'"'. $row['Project_Image'].'"';
                else echo 'src'.'='.'"'.base_url().'public/backend/images/no-image.png'.'"'; 
                // Nếu có Logo thì hiện Logo, ko có thì hiện hình no img
              ?>
          ></td>
          <td>
            <?php echo (($row['Project_Hot'])==1? "True":"")?>
            <?php echo (($row['Project_Hot'])==0? "False":"")?>
          </td>
          <td>
            <?php echo (($row['Project_Status'])==1? "Hiện":"")?>
            <?php echo (($row['Project_Status'])==0? "Ẩn":"")?>
          </td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_project/DetailProject/<?=$row['Project_ID']?>" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?=base_url()?>backend/c_project/DeleteProject/<?=$row['Project_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa tin này không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            <a target="blank" href="<?=base_url()?><?=$this->m_project->GetLinkCatalog($row['Project_Catalog_ID'])?>/<?=$row['Project_Alias']?>.html" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>          
</div>

<div class="LoadMore text-center">
  <a id="LoadMore">Xem thêm</a>
</div>

<script type="text/javascript">
$(document).ready(function () {
    $('table tbody tr').hide();
    size = $("table tbody tr").size();
    if(size<=10) $('#LoadMore').hide();
    x=10;
    $('table tbody tr:lt('+x+')').show();
    $('#LoadMore').click(function () {
        x= (x+10 <= size) ? x+10 : size;
        $('table tbody tr:lt('+x+')').fadeIn(1000);
    });
});
</script>
