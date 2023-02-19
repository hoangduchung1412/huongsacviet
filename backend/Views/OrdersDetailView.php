<?php 
//load noi dung file Layout vao day
    self::$fileLayout = "LayoutView.php";
?>
<?php 
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $conn = Connection::getInstance();
    $query = $conn->query("select * from orders where id = $id");
    $record = $query->fetch(PDO::FETCH_OBJ);
 ?>
<div class="col-md-9 row bill">
    <div class="bill-header col-md-12 row" style="margin: auto;">
      <div class="col-md-4 bill-title">
        CÔNG TY HƯƠNG SẮC VIỆT 
      </div>
      <div class="col-md-4 bill-title">
        <center>PHIẾU XUẤT KHO</center>
        <center>Ngày xuất: <?php echo date("d/m/Y",strtotime($record->date)); ?></center>
      </div>
      <div class="col-md-4 bill-title">
        <center>Mã Xuất: 00<?php echo $record->id; ?></center>
      </div>
    </div>
    
    <div class="col-md-12">
      <hr>
    </div>

    <div class="col-md-12 bill-body">
      <div class="col-md-12 body-title" style="text-align: center;">
        <h2>PHIẾU XUẤT KHO</h2>
      </div>
      <?php 
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $conn = Connection::getInstance();
        $query = $conn->query("select * from users where id = (select user_id from orders where id=$id limit 0,1)");
        $user = $query->fetch(PDO::FETCH_OBJ);
      ?>
      <div class="col-md-12 body-user-information row">
        <div class="col-md-12 user-name pb"><strong>Người lập phiếu :</strong> <?php echo isset($user->fullname)?$user->fullname:""; ?></div>
        <div class="col-md-6 user-email pb"><strong>Email :</strong> <?php echo isset($user->email)?$user->email:""; ?></div>
        <div class="col-md-6 user-phone pb"><strong>Số điện thoại :</strong> <?php echo isset($user->phone)?$user->phone:""; ?></div>
        <div class="col-md-12 user-address pb"><strong>Địa chỉ :</strong> <?php echo isset($user->address)?$user->address:""; ?></div>
      </div>
      <div class="col-md-12 body-table pb">
        <table class="table table-bordered text-center">
            <thead class="thead-dark ">
                <tr>
                <!-- <th width = "10%" >STT</th> -->
                <th width = "35%" >Tên vật tư</th>
                <th width = "15%" >Số lượng</th>
                <th width = "20%" >Đơn giá</th>
                <th width = "20%" style="text-align: center;" >Thành tiền</th>
                </tr>
            </thead> 
            <tbody>
                <?php foreach($data as $rows): ?>
                    <?php $supply = (new OrdersController())->modelGetSupply($rows->supply_id); ?>
              <tr>
                  <!-- <td width = "10%" scope="row">
                      1
                  </td> -->
                  <td width = "35%" scope="row" style="font-size: 15px;"><?php echo $supply->name; ?></td>
                  <td width = "15%" scope="row"><?php echo $rows->quantity ?></td>
                  <td width = "20%" scope="row"><?php echo number_format($supply->out_price); ?></td>
                  <td width = "20%" scope="row"><?php echo number_format($rows->price); ?></td>             
              </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
      <div class="col-md-12 body-footer row">
        <div class="col-md-12 price-transport pb"><strong>Phí vận chuyển : </strong>30000</div>
        <div class="col-md-6 price-total pb"><strong>Tổng cộng : </strong><?php echo $record->price + 30000; ?></div>
        <!-- <div class="col-md-6 price-discount pb"><strong>Chiết khấu : </strong>10000</div> -->
        <div class="col-md-12 price-total-payment pb"><strong>Thực thanh toán : </strong><?php echo $record->price + 30000; ?></div>
        <div class="col-md-12 payment-method pb"><strong>Phương thức thanh toán : </strong>Thanh toán khi nhận hàng</div>
      </div>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
    <div class="col-md-12 bill-footer row">
      <div class="col-md-12 time-create pb" style="text-align: right;"><strong>Ngày lập : </strong><?php echo date("d/m/Y",strtotime($record->date)); ?></div>
      <div class="col-md-6 user-name  pb" style="padding-left: 30px;"><strong>Người lập phiếu : </strong><?php echo isset($user->fullname)?$user->fullname:""; ?></div>
      <div class="col-md-6 virifier-name pb"><strong>Người xác nhận : </strong><?php echo $_SESSION['fullname']; ?></div>
    </div>

    <div class="col-md-12 bill-status pb" style="text-align: center;"><strong>Trạng thái đơn hàng: </strong>
        <?php if($record->status == 1): ?>
            <div>Đã xác nhận</div>
        <?php elseif($record->status == 2): ?>
            <div>Đơn hàng đã bị huỷ</div>
        <?php else: ?>
            <div>Chưa xác nhận</div>
        <?php endif; ?></div>
</div>

<div style="margin: 20px; padding: 10px; font-size: 15px;" class="panel-footer"><a href="#" onclick="history.go(-1);" class="btn btn-primary">Quay lại</a></div>