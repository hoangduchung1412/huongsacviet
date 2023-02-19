<?php 
//load file layout vao day
self::$fileLayout = "LayoutView.php";
?>
<div class="col-md-12 row supplies-detail">
    <div class="col-md-4 img_detail">
         <img src="../assets/upload/supplies/<?php echo $record->photo; ?>">
    </div>
    <div class="col-md-7 row content-detail">
         <h1 class="supply-name">
            <?php echo $record->name; ?>
            <hr size="1">
            <hr size="1">
         </h1>
         <div class="col-md-7">
             <p class="supply-id">
                 Mã vật tư : 
                 <strong> 00<?php echo $record->id ?></strong>
             </p>
             <p class="supply-nsx">
                 Nhà sản xuất : 
                 <strong><?php echo $record->name_nsx; ?></strong>
             </p>
             <p class="supply-type">
                 Loại vật tư : 
                 <strong>
             		<?php 
                        //co the truy can truc tiep csdl tu view
                        $conn = Connection::getInstance();
                        $query = $conn->query("select name from categories where id=$record->category_id");
                        //lay mot ban ghi
                        $category = $query->fetch(PDO::FETCH_OBJ);
                        echo isset($category->name) == true ? $category->name : "";
                     ?>
	             </strong>
             </p>
             <p class="supply-price">
                 Giá bán : 
                 <strong><?php echo number_format($record->out_price); ?></strong>
             </p>
             <p class="supply-state">
                 Tình trạng : 
                 <strong><?php echo $record->amount > 0 ? "Còn hàng" : "Hết hàng"; ?></strong>
             </p>
             <div class="supply-amount">
                <label style="margin-right: 15px; margin-top: 10px;" for="qty">Số lượng : </label>
                <div class="pull-left">
                    <div class="pull-left">
                        <input onkeyup="valid(this,'numbers')" min="1" type="text" title="Số lượng" value="1" id="qtym" name="quantity" class="input-text">
                        <div class="btn-count">
                            <button onclick="var result = document.getElementById('qtym'); var qtypro =result.value; if( !isNaN(qtypro)) result.value++; return false;" type="button">
                                <i class="fas fa-angle-up"></i>
                            </button>
                            <button onclick="var result = document.getElementById('qtym'); var qtypro =result.value; if( !isNaN(qtypro) && qtypro > 1) result.value--; return false;" type="button">
                                <i class="fas fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <?php if($_SESSION['permission']==1 || $_SESSION['permission']==3 || $_SESSION['permission']==4): ?>
            <div class="supply-buy" style="margin-top: 10px;">
                <?php if($record->amount > 0): ?>
                <a href="index.php?controller=cart&action=create&id=<?php echo $record->id ?>">
                    <span class="supply-buy-cart">Đặt vật tư</span>
                </a>
                <?php else: ?>
                <a href="index.php?controller=supplies" onclick="return window.alert('Sản phẩm này đã hết hàng!');">
                    <span class="supply-buy-cart">Đặt vật tư</span>
                </a>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <div class="supply-buy" style="margin-top: 10px;">
                <a href="" onclick="return window.alert('Chức năng này không hỗ trợ cho tài khoản của bạn!');"> 
                    <span class="supply-buy-cart">Đặt vật tư</span>
                </a>
            </div>
            <?php endif; ?>
         </div>

         <div class="col-md-5">
             <i style="font-size: 16px;">
                <?php echo $record->description; ?>
             </i>
         </div>
    </div>
    <div class="col-md-12 supplies-description">
        <h1 class="supply-des-title">Mô tả sản phẩm: </h1>
        <hr size="1">
        <div class="supply-des" style="text-align: justify; font-size: 15px;">
            <?php echo $record->content; ?>
        </div>
    </div>
</div>