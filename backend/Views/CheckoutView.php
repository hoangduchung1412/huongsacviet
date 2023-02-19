<?php 
//load noi dung file Layout vao day
    self::$fileLayout = "LayoutView.php";
?>
<?php 
    $user_id = $_SESSION['user_id'];
    $conn = Connection::getInstance();
    $query = $conn->query("select * from users where id = $user_id");
    $user = $query->fetch(PDO::FETCH_OBJ);
 ?>
<div class="checkout row">
    <div class="checkout-content checkout-left-content col-lg-7 ">
        <div class="checkout-header">
            <h2 class="checkout-title">Thông tin giao hàng</h2>
        </div>

        <form method="POST" action="index.php?controller=checkout&action=checkout">
            <div class="customer-information checkout-section">

            <div class="fieldset">
                <div class="field-wrap col-md-12 px-0">
                    <!-- The input -->
                    <input class="field-input w-100" type="text" placeholder="Họ và tên" name="fullname" value="<?php echo $user->fullname; ?>">

                    <!-- The label -->
                    <label class="field-label" for="name">Họ và tên</label>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="field-wrap col-md-8 px-0">
                            <!-- The input -->
                            <input class="field-input w-100" type="email" placeholder="Email" name="email" value="<?php echo $user->email; ?>">

                            <!-- The label -->
                            <label class="field-label" for="email">Email</label>
                        </div>

                        <div class="field-wrap col-md-4 pr-0">
                            <!-- The input -->
                            <input class="field-input w-100" type="tel" maxlength="11" placeholder="Số điện thoại" name="phone" value="<?php echo $user->phone; ?>" />

                            <!-- The label -->
                            <label class="field-label" for="phone">Số điện thoại</label>
                        </div>
                    </div>
                </div>
                <div class="field-wrap col-12 px-0">
                    <!-- The input -->
                    <input class="field-input w-100" type="text" placeholder="Địa chỉ" name="address" value="<?php echo $user->address; ?>">

                    <!-- The label -->
                    <label class="field-label" for="address">Địa chỉ</label>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="field-wrap field-select-wrap col-md-4 px-0">
                            <!-- The input -->
                            <select class="field-select w-100" id="province" name="province">
                                <option value="null">Chọn tỉnh/thành</option>
                            </select>

                            <!-- The label -->
                            <label class="field-label" for="province">Tỉnh / thành</label>
                        </div>

                        <div class="field-wrap field-select-wrap col-md-4 pr-0">
                            <!-- The input -->
                            <select class="field-select w-100" id="district" name="district">
                                <option value="null">Chọn quận/huyện</option>
                            </select>

                            <!-- The label -->
                            <label class="field-label" for="district">Quận / huyện</label>
                        </div>

                        <div class="field-wrap field-select-wrap col-md-4 pr-0">
                            <!-- The input -->
                            <select class="field-select w-100" id="ward" name="ward">
                                <option value="null">Chọn phường/xã</option>
                            </select>

                            <!-- The label -->
                            <label class="field-label" for="ward">Phường / xã</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shipping-method checkout-section">
            <div class="checkout-header">
                <h2 class="checkout-title">Phương thức vận chuyển</h2>
            </div>
            <div class="shipping-method-content">
                <div class="field-wrap field-select-wrap col-md-12 pr-0">
                    <!-- The input -->
                    <?php 
                        //lay bien ket noi csdl
                        $conn = Connection::getInstance();
                        //thuc hien truy van
                        $query = $conn->query("select * from transport");
                        //tra ve tat ca cac ket qua lay duoc
                        $transport = $query->fetchAll(PDO::FETCH_OBJ);
                    ?>
                    <select class="field-select w-100" id="ward" name="transport_method">
                        <option value="null">Chọn phương thức vận chuyển</option>
                        <option value="1">Giao hàng nhanh</option>
                        <option value="2">Giao hàng tiết kiệm</option>
                        <option value="3">Giao hàng hoả tốc</option>
                    </select>

                    <!-- The label -->
                    <label class="field-label" for="ward">Phương thức vận chuyển</label>
                </div>   
            </div>

        </div>

        <div class="payment-method checkout-section">
            <div class="checkout-header">
                <h2 class="checkout-title">Phương thức thanh toán</h2>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne"
                            class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="payment-method1" name="payment_method"
                                class="custom-control-input" checked="checked" value="1">
                            <label class="custom-control-label" for="payment-method1">Chuyển khoản Techcombank
                                (Yêu thích)</label>
                        </div>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body blank-slate">
                            Techcombank chi nhánh Hà Nội
                            Vui lòng ghi rõ tên và số điện thoại nhé!

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <div data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo"
                            class="custom-control custom-radio custom-control-inline collapsed">
                            <input type="radio" id="payment-method2" name="payment_method"
                                class="custom-control-input" value="2">
                            <label class="custom-control-label" for="payment-method2">Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionExample">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <div data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree"
                            class="custom-control custom-radio custom-control-inline collapsed">
                            <input type="radio" id="payment-method3" name="payment_method"
                                class="custom-control-input" value="3">
                            <label class="custom-control-label" for="payment-method3">Thanh toán bằng thẻ
                                ATM/Visa/Master/JCB</label>
                        </div>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="checkout-footer d-flex align-items-center justify-content-between">
            <a class="previous-link" href="index.php?controller=cart"><i class="fas fa-chevron-left mr-2"></i>Danh sách vật tư</a>
            <a href="index.php?controller=checkout&action=checkout"><button name="button" type="submit" class="continue-btn btn">Hoàn tất đơn hàng</button></a>
        </div>

    </div>
    <div class="checkout-content checkout-right-content col-lg-5">
        <?php foreach($_SESSION['cart'] as $supply): ?>
        <div class="order-section">
            <div class="order-prd-list order-content">
                <table class="supply-table">
                    <tbody>
                        <tr class="order-supply">
                            <td class="supply-image">
                                <div class="supply-thumbnail">
                                    <div class="supply-thumbnail-wrapper">
                                        <img class="supply-thumbnail-image" src="../assets/upload/supplies/<?php echo $supply['photo']; ?>">
                                    </div>
                                    <span class="supply-thumbnail-quantity"><?php echo $supply['number']; ?></span>
                                </div>
                            </td>
                            <td class="supply-infor">
                                <span class="supply-name order-prd-list-txt"><a style="font-size: 14px; text-decoration: none;" href="index.php?controller=supplys&action=detail&id=<?php echo $supply['id'] ?>"><?php echo $supply['name'] ?></a></span>
                                <span class="supply-price order-small-txt"> </span>
                            </td>
                            <td class="supply-price">
                                <span class="order-prd-list-txt"><?php echo number_format($supply['number']*($supply['price'])); ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php endforeach; ?>

            </div>
            <div class="order-total order-content">
                <table class="total-table w-100">
                    <tbody>
                        <tr class="total total-subtotal">
                            <td class="total-name">Tạm tính</td>
                            <td class="total-price">
                                <span class="order-summary-emphasis">
                                    <?php echo number_format((new CheckoutController())->cartTotal()) ?>
                                </span>
                            </td>
                        </tr>

                        <tr class="total total-shipping">
                            <td class="total-name">Phí vận chuyển</td>
                            <td class="total-price">
                                <span class="order-summary-emphasis">—</span>
                            </td>
                        </tr>

                    </tbody>
                    <tfoot class="total-table-footer">
                        <tr class="total">
                            <td class="total-name payment-due-label">
                                <span class="payment-due-label-total">Tổng cộng</span>
                            </td>
                            <td class="total-name payment-due">
                                <span class="payment-due-currency">VND</span>
                                <span class="payment-due-price">
                                    <?php echo number_format((new CheckoutController())->cartTotal()) ?>
                                </span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

    </div>
</div>