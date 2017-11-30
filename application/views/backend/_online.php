<div class="list-menu">
  <div class="panel panel-default">
    <div class="panel-heading">
      <span>Số người đang online</span>
    </div>
    <table class="table table-condensed table-striped table-hover">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="15%">IP</th>
          <th width="15%">Thời điểm truy cập</th>
          <th width="20%">Đường dẫn</th>
          <th width="45%">Trình duyệt</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $i=1;
        foreach ($online as $row) { 
      ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$row['Counter_IP']?></td>
          <td>
            <?php 
              $date = new DateTime($row['Counter_Date']);
              echo $date->format('d/m/Y H:i:s'); // Hiển thị ngày tháng dạng d/m/Y
            ?>
          </td>
          <td><?=$row['Counter_Path']?></td>
          <td><?=$row['Counter_Browser']?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <!--<div class="pagi text-center"><?=$pagination?></div>-->
  </div>          
</div>