<?php 
//load noi dung file Layout vao day
    self::$fileLayout = "LayoutView.php";
?>
<main class="main position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h5"><b>Khu Vực</b> </div>
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <?php if($_SESSION['permission']==1 || $_SESSION['permission']==4): ?>
                        <a href="index.php?controller=districts&action=create" class="btn btn-dark text-light"><i class="fas fa-plus pr-1"></i>  Thêm </a>
                        <?php else:  ?>
                        <a href="" class="btn btn-dark text-light" onclick="return window.alert('Bạn không có quyền truy cập');"><i class="fas fa-plus pr-1"></i>  Thêm </a>
                        <?php endif; ?>
                        <form action="" method="get" class="form-inline">
                          <input class="form-control mr-sm-2" name="query" type="search" placeholder="Tìm Kiếm" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0 " ><i class="fas fa-search"></i></button>
                        </form>
                      </nav>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark ">
                                <tr>
                                <th width = "90%">Name</th>
                                <th width = "5%">Sửa</th>
                                <th width = "5%" >Xóa</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php foreach ($data as $rows): ?>
                                    <tr>
                                        <td width = "90%" scope="row"><?php echo $rows->name; ?></td>
                                        <?php if($_SESSION['permission']==1 || $_SESSION['permission']==4): ?>
                                        <td width = "5%"> <a href="index.php?controller=districts&action=update&id=<?php echo $rows->id ?>"><button  value="" type="button" class="btn btn-outline-warning"> <i class="fas fa-pen"></i></button></a> </td>
                                        
                                        <td width = "5%"><a href="index.php?controller=districts&action=delete&id=<?php echo $rows->id ?>" onclick="return window.confirm('Are you sure?');"><button value="" type="button" class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </button></a> </td> 
                                        <?php else: ?>
                                        <td width = "5%"> <a href="" onclick="return window.alert('Bạn không có quyền truy cập');"><button  value="" type="button" class="btn btn-outline-dark"> <i class="fas fa-pen"></i></button></a> </td>
                                        
                                        <td width = "5%"><a href="" onclick="return window.alert('Bạn không có quyền truy cập');"><button value="" type="button" class="btn btn-outline-dark"> <i class="fas fa-trash-alt"></i> </button></a> </td> 
                                        <?php endif; ?>
                                    </tr>
                                    <?php     
                                        //lay bien ket noi csdl
                                        $conn = Connection::getInstance();
                                        $query = $conn->query("select * from districts where parent_id = {$rows->id} order by id desc");
                                        //tra ve tat ca cac ket qua lay duoc
                                        $districtsSub =  $query->fetchAll(PDO::FETCH_OBJ);
                                    ?>
                                    <?php foreach ($districtsSub as $rowsSub): ?>
                                    <tr>
                                        <td style="padding-left: 40px" width = "90%" scope="row"><?php echo $rowsSub->name; ?></td>
                                        <?php if($_SESSION['permission']==1): ?>
                                        <td width = "5%"> <a href="index.php?controller=districts&action=update&id=<?php echo $rowsSub->id ?>"><button  value="" type="button" class="btn btn-outline-warning"> <i class="fas fa-pen"></i></button></a> </td>
                                        
                                        <td width = "5%"><a href="index.php?controller=districts&action=delete&id=<?php echo $rowsSub->id ?>" onclick="return window.confirm('Are you sure?');"><button value="" type="button" class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </button></a> </td> 
                                        <?php else: ?>
                                        <td width = "5%"> <a href="" onclick="return window.alert('Bạn không có quyền truy cập');"><button  value="" type="button" class="btn btn-outline-dark"> <i class="fas fa-pen"></i></button></a> </td>
                                        
                                        <td width = "5%"><a href="" onclick="return window.alert('Bạn không có quyền truy cập');"><button value="" type="button" class="btn btn-outline-dark"> <i class="fas fa-trash-alt"></i> </button></a> </td> 
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <?php for($i=1;$i<=$numPage;$i++): ?>
                                <li class="page-item"><a class="page-link" href="index.php?controller=districts&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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