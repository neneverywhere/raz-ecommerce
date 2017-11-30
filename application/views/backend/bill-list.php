<div class="list-menu">
  <div class="panel panel-default">
    <div class="panel-heading">
      <span>Đơn đặt hàng</span>
    </div>
    <table class="table table-striped table-condensed table-hover">
      <thead>
        <tr>
          <th width="5%">ID</th>
          <th width="15%">Tên</th>
          <th width="15%">Email</th>
          <th width="10%">Điện thoại</th>
          <th width="15%">Địa chỉ</th>
          <th class="text-center" width="25%">Sản phẩm</th>
          <th width="10%">Ngày đặt</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i=1;
      foreach ($ListBill as $row) { ?>
        <tr>
          <td><?=$i++?></td>
          <td><?=$row['Bill_Guest_Name']?></td>
          <td><?=$row['Bill_Email']?></td>
          <td><?=$row['Bill_Phone']?></td>
          <td><?=$row['Bill_Address']?></td>
          <td>
            <dl class="dl-horizontal">
              <?php $BillDetail = $this->m_bill->ListBillDetail($row['Bill_ID']);
                foreach ($BillDetail as $key) {
              ?>
              <dt data-toggle="tooltip" data-placement="left" title="<?=$key['Bill_Detail_Product_Name']?>"><?=$key['Bill_Detail_Product_Name']?>:</dt>
              <dd><?=$key['Bill_Detail_Product_Num']?></dd>
              <?php } ?>
            </dl>
            <dl class="dl-horizontal">
              <dt>Tổng trị giá:</dt>
              <dd style="font-weight: bold; color: red"><?=number_format($row['Bill_Price'])?> đ</dd>
            </dl>
          </td>
          <td>
            <?php 
              $date = new DateTime($row['Bill_Date_Book']);
              echo $date->format('d/m/Y H:i:s'); // Hiển thị ngày tháng dạng d/m/Y
            ?>
          </td>
          <td class="action">
            <a href="<?=base_url()?>backend/c_bill/DeleteBill/<?=$row['Bill_ID']?>" onclick='return confirm("Bạn có chắc muốn xóa không ?")' title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <div class="pagi text-center"><?=$pagination?></div>
  </div>          
</div>