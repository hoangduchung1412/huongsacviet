<?php 
//load noi dung file Layout vao day
    self::$fileLayout = "LayoutView.php";
?>
<main class="main position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h5"><b>Quản Lý Vật Tư</b> </div>
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <?php if($_SESSION['permission']==1 || $_SESSION['permission']==2 || $_SESSION['permission']==4): ?>
                        <a href="index.php?controller=supplies&action=create" class="btn btn-dark text-light"><i class="fas fa-plus pr-1"></i>  Thêm </a>
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
                                <th width = "15%" >Ảnh</th>
                                <th width = "20%" >Tên vật tư</th>
                                <th width = "14%" >Loại vật tư</th>
                                <th width = "8%" >Giá xuất</th>
                                <th width = "12%" >Tình trạng</th>
                                <th width = "16%" >Nhà sản xuất</th>
                                <th width = "5%">Xem </th>
                                <th width = "5%">Sửa</th>
                                <th width = "5%" >Xóa</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php foreach ($data as $rows): ?>
                                    <tr>
                                        <td width = "15%" scope="row">
                                            <?php if($rows->photo != "" && file_exists("../assets/upload/supplies/".$rows->photo)): ?>
                                            <img src="../assets/upload/supplies/<?php echo $rows->photo; ?>" style="width:100px;">
                                            <?php endif; ?>
                                        </td>
                                        <td width = "20%" scope="row"><?php echo $rows->name; ?></td>
                                        <td width = "14%" scope="row">
                                            <?php 
                                                //co the truy can truc tiep csdl tu view
                                                $conn = Connection::getInstance();
                                                $query = $conn->query("select name from categories where id=$rows->category_id");
                                                //lay mot ban ghi
                                                $category = $query->fetch(PDO::FETCH_OBJ);
                                                echo isset($category->name) == true ? $category->name : "";
                                             ?>
                                        </td>
                                        <td width = "8%" scope="row"><?php echo number_format($rows->out_price); ?></td>
                                        <td width = "12%" scope="row"><?php echo $rows->amount > 0 ? "Còn hàng" : "Hết hàng"; ?></td>
                                        <td width = "16%" scope="row">
                                            <?php echo $rows->name_nsx; ?>
                                        </td>
                                        <td width = "5%"> <a href="index.php?controller=supplies&action=view&id=<?php echo $rows->id ?>"><button  value="" type="button" class="btn btn-outline-primary"> <i class="fas fa-eye"></i></button></a> </td>
                                        
                                        <?php if($_SESSION['permission']==1 || $_SESSION['permission']==2 || $_SESSION['permission']==4): ?>
                                        <td width = "5%"> <a href="index.php?controller=supplies&action=update&id=<?php echo $rows->id ?>"><button  value="" type="button" class="btn btn-outline-warning"> <i class="fas fa-pen"></i></button></a> </td>
                                        
                                        <td width = "5%"><a href="index.php?controller=supplies&action=delete&id=<?php echo $rows->id ?>" onclick="return window.confirm('Are you sure?');"><button value="" type="button" class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </button></a> </td> 
                                        <?php else: ?>
                                        <td width = "5%"> <a href="index.php?controller=supplies" onclick="return window.alert('Bạn không có quyền truy cập');"><button  value="" type="button" class="btn btn-outline-dark"> <i class="fas fa-pen"></i></button></a> </td>
                                        
                                        <td width = "5%"><a href="index.php?controller=supplies" onclick="return window.alert('Bạn không có quyền truy cập');"><button value="" type="button" class="btn btn-outline-dark"> <i class="fas fa-trash-alt"></i> </button></a> </td> 
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <?php for($i=1;$i<=$numPage;$i++): ?>
                                <li class="page-item"><a class="page-link" href="index.php?controller=supplies&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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