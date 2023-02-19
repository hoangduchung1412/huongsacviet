<?php 
//load noi dung file Layout vao day
    self::$fileLayout = "LayoutView.php";
?>
<div class="template-cart">
     <form action="index.php?controller=cart&action=update" method="post">
         <main class="main position-relative">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header h5"><b>Danh Sách Vật Tư</b> </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark ">
                                        <tr>
                                        <th width = "30%" >Ảnh</th>
                                        <th width = "30%" >Tên vật tư</th>
                                        <th width = "15%" >Giá xuất</th>
                                        <th width = "10%" >Số lượng</th>
                                        <th width = "10%" >Thành tiền</th>
                                        <th width = "5%" >Xóa</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php foreach($_SESSION['cart'] as $supply): ?>
                                            <tr>
                                                <td width = "30%" scope="row">
                                                    <img src="../assets/upload/supplies/<?php echo $supply['photo']; ?>" class="img-responsive" style="width: 80%;">
                                                </td>
                                                <td width = "30%" scope="row" style="font-size: 15px;"><a href="index.php?controller=supplies&action=view&id=<?php echo $supply['id'] ?>"><?php echo $supply['name']; ?></a></td>
                                                <td width = "15%" scope="row"><?php echo number_format($supply['price']); ?></td>
                                                <td width = "10%" scope="row"><input type="number" id="qty" min="1" class="input-control" value="<?php echo $supply['number']; ?>" name="supply_<?php echo $supply['id']; ?>" required="Không thể để trống"></td>
                                                <td width = "10%" scope="row"><?php echo number_format($supply['price'] * $supply['number']); ?></td>                 
                                                <td width = "5%"><a href="index.php?controller=cart&action=delete&id=<?php echo $supply['id']; ?>" onclick="return window.confirm('Are you sure?');"><button value="" type="button" class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </button></a> </td> 
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <?php if((new CartController())->cartNumber()): ?>
                                    <tfoot>
                                        <tr>
                                          <td colspan="6"><a href="index.php?controller=cart&action=destroy" class="button pull-left">Xóa toàn bộ</a> 
                                          <a href="index.php?controller=supplies" class="button pull-right black">TIẾP TỤC THÊM VẬT TƯ</a>
                                            <input type="submit" class="button pull-right" value="Cập nhật"></td>
                                        </tr>
                                    </tfoot>
                                    <?php endif; ?>
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </main>
     </form>
    <?php if((new CartController())->cartNumber()): ?>
    <div class="total-cart"> Tổng tiền thanh toán:
      <?php echo number_format((new CartController())->cartTotal()) ?> <br>
      <a href="index.php?controller=checkout" class="button black">Thanh toán</a> </div>
  </div>
  <?php endif; ?>
 </div>