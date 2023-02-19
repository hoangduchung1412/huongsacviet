<?php 
//load noi dung file Layout vao day
    self::$fileLayout = "LayoutView.php";
?>
<main class="main position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h5"><b></b>Lịch Sử Xuất Kho </div>
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <form action="" method="get" class="form-inline">
                          <input class="form-control mr-sm-2" name="query" type="search" placeholder="Tìm Kiếm" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0 " ><i class="fas fa-search"></i></button>
                        </form>
                      </nav>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="thead-dark ">
                                <tr>
                                <th width = "20%" >Họ Và Tên</th>
                                <th width = "15%" >Địa chỉ</th>
                                <th width = "15%" >Điện thoại</th>
                                <th width = "15%" >Ngày mua</th>
                                <th width = "10%" >Giá</th>
                                <th width = "15%">Trạng thái </th>
                                <th width = "5%">Huỷ</th>
                                <th width = "5%">Xem</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php foreach($data as $rows): ?>
                                <?php $user = (new ExportHisController())->modelGetUser($rows->user_id); ?>
                                    <tr>
                                        <th width = "20%" scope="row"><?php echo isset($user->fullname)?$user->fullname:""; ?></th>
                                        <td width = "15%" scope="row"><?php echo isset($user->address)?$user->address:""; ?></td>
                                        <td width = "15%" scope="row"><?php echo isset($user->phone)?$user->phone:""; ?></td>
                                        <td width = "15%" scope="row"><?php echo date("d/m/Y",strtotime($rows->date)); ?></td>
                                        <td width = "15%" scope="row"><?php echo number_format($rows->price); ?></td>
                                        <td width = "15%" scope="row">
                                            <?php if($rows->status == 1): ?>
                                                <div>Đã xác nhận</div>
                                            <?php elseif($rows->status == 2): ?>
                                                <div>Đã huỷ</div>
                                            <?php else: ?>
                                                <div>Chưa xác nhận</div>
                                            <?php endif; ?>
                                        </td>
                                        <td width = "5%"> 
                                            <?php if($rows->status == 0): ?>
                                            <a onclick="return window.confirm('Kiểm tra chắc chắn trước khi huỷ!');" href="index.php?controller=exporthis&action=cancel&id=<?php echo $rows->id; ?>"><button  value="" type="button" class="btn btn-outline-danger"> <i class="fas fa-ban"></i></button></a> </td>
                                        <?php elseif($rows->status == 2): ?>
                                            <a href="index.php?controller=exporthis" onclick="return window.alert('Đơn hàng này đã bị huỷ!');"><button  value="" type="button" class="btn btn-outline-danger"> <i class="fas fa-ban"></i></button></a> </td>
                                        <?php else: ?>
                                            <a href="index.php?controller=exporthis" onclick="return window.alert('Bạn không thể huỷ khi đơn hàng này đã được xác nhận, vui lòng liên hệ nhân viên để được hỗ trợ!');"><button  value="" type="button" class="btn btn-outline-danger"> <i class="fas fa-ban"></i></button></a> </td>
                                            <?php endif; ?>
                                        </td>
                                        <td width = "5%"> <a href="index.php?controller=exporthis&action=detail&id=<?php echo $rows->id; ?>"><button  value="" type="button" class="btn btn-outline-primary"> <i class="fas fa-eye"></i></button></a> </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <?php for($i=1;$i<=$numPage;$i++): ?>
                                <li class="page-item"><a class="page-link" href="index.php?controller=exporthis&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php endfor; ?>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                        <style type="text/css">
                            .pagination {
                                float: right;
                            }
                            .page-link {
                                color: #333;
                                font-size: 15px;
                            }
                        </style>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</main>