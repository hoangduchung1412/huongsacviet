<?php 
//load noi dung file Layout vao day
    self::$fileLayout = "LayoutView.php";
?>
<main class="main position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h5"><b>Quản Lý Tài Khoản</b> </div>
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <?php if($_SESSION['permission']==1): ?>
                        <a href="index.php?controller=users&action=create" class="btn btn-dark text-light"><i class="fas fa-plus pr-1"></i>  Thêm </a>
                        <?php else:  ?>
                        <a href="" class="btn btn-dark text-light" onclick="return window.alert('Bạn không có quyền truy cập');"><i class="fas fa-plus pr-1"></i>  Thêm </a>
                        <?php endif; ?>
                        <form action="" method="get" class="form-inline">
                          <input class="form-control mr-sm-2" name="query" type="search" placeholder="Tìm Kiếm" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0 " ><i class="fas fa-search"></i></button>
                        </form>
                      </nav>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="thead-dark ">
                                <tr>
                                <th width = "5%" >ID</th>
                                <th width = "20%" >Họ Và Tên</th>
                                <th width = "20%" >Email</th>
                                <th width = "15%" >Trạng thái</th>
                                <th width = "15%" >Loại tài khoản</th>
                                <th width = "10%" >Username</th>
                                <th width = "5%">Xem </th>
                                <th width = "5%">Sửa</th>
                                <th width = "5%" >Xóa</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php foreach ($data as $rows): ?>
                                    <tr>
                                        <th width = "5%" scope="row"><?php echo $rows->id; ?></th>
                                        <td width = "20%" scope="row"><?php echo $rows->fullname; ?></td>
                                        <td width = "20%" scope="row"><?php echo $rows->email; ?></td>
                                        <td width = "10%" scope="row"><?php echo $rows->is_block == 1 ? "Bị khoá" : "Không bị khoá"; ?></td>
                                        <?php if($rows->permission == 1):  ?>
                                            <td width = "10%" scope="row">Admin</td>
                                        <?php elseif($rows->permission == 2):  ?>
                                            <td width = "10%" scope="row">Nhà sản xuất</td>
                                        <?php elseif($rows->permission == 3): ?>
                                           <td width = "10%" scope="row">Nhà cung cấp</td>
                                        <?php else: ?>
                                            <td width = "10%" scope="row">Nhân viên</td>
                                        <?php endif; ?>
                                        <td width = "10%" scope="row"><?php echo $rows->username; ?></td>
                                        <td width = "5%"> <a href="index.php?controller=users&action=view&id=<?php echo $rows->id ?>"><button  value="" type="button" class="btn btn-outline-primary"> <i class="fas fa-eye"></i></button></a> </td>
                                        
                                        <?php if($_SESSION['permission']==1): ?>
                                        <td width = "5%"> <a href="index.php?controller=users&action=update&id=<?php echo $rows->id ?>"><button  value="" type="button" class="btn btn-outline-warning"> <i class="fas fa-pen"></i></button></a> </td>
                                        
                                        <td width = "5%"><a href="index.php?controller=users&action=delete&id=<?php echo $rows->id ?>" onclick="return window.confirm('Are you sure?');"><button value="" type="button" class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </button></a> </td> 
                                        <?php else: ?>
                                        <td width = "5%"> <a href="" onclick="return window.alert('Bạn không có quyền truy cập');"><button  value="" type="button" class="btn btn-outline-warning"> <i class="fas fa-pen"></i></button></a> </td>
                                        
                                        <td width = "5%"><a href="" onclick="return window.alert('Bạn không có quyền truy cập');"><button value="" type="button" class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </button></a> </td> 
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <?php for($i=1;$i<=$numPage;$i++): ?>
                                <li class="page-item"><a class="page-link" href="index.php?controller=users&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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