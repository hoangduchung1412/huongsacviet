<?php 
//load file layout vao day
self::$fileLayout = "LayoutView.php";
?>
<div class="">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title">Cập nhật thông tin vật tư</h4>
        </div>
        <div class="modal-body " >
        
          <form method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
                
            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Tên vật tư : </label>
                <input type="text" class="col-md-9 form-control" value="<?php echo isset($record->name)?$record->name : ''; ?>" name="name">
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Loại vật tư : </label>
                <?php 
                    //lay bien ket noi csdl
                    $conn = Connection::getInstance();
                    //thuc hien truy van
                    $query = $conn->query("select * from categories where parent_id=0 order by id desc");
                    //tra ve tat ca cac ket qua lay duoc
                    $categories = $query->fetchAll(PDO::FETCH_OBJ);
                 ?>
                <select name="category_id" class="form-control col-md-9" style="width:200px;">
                    <option value=""></option>
                    <?php foreach($categories as $rows): ?>
                        <option <?php if(isset($record->category_id)&&$record->category_id == $rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                        <?php 
                            //lay bien ket noi csdl
                            $conn = Connection::getInstance();
                            //thuc hien truy van
                            $query = $conn->query("select * from categories where parent_id=$rows->id order by id desc");
                            //tra ve tat ca cac ket qua lay duoc
                            $categoriesSub = $query->fetchAll(PDO::FETCH_OBJ);
                         ?>
                         <?php foreach($categoriesSub as $rowsSub): ?>
                                <option <?php if(isset($record->category_id)&&$record->category_id == $rowsSub->id): ?> selected <?php endif; ?> value="<?php echo $rowsSub->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name; ?></option>                                    
                            <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Giá nhập : </label>
                <input type="number" class="col-md-9 form-control" value="<?php echo isset($record->in_price)?$record->in_price : '0'; ?>" name="in_price">
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Giá xuất : </label>
                <input type="number" class="col-md-9 form-control" value="<?php echo isset($record->out_price)?$record->out_price : '0'; ?>" name="out_price">   
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Khối lượng : </label>
                <input type="number" class="col-md-9 form-control" value="<?php echo isset($record->weight)?$record->weight : '0'; ?>" name="weight">   
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Số lượng : </label>
                <input type="number" class="col-md-9 form-control" value="<?php echo isset($record->amount)?$record->amount : '0'; ?>" name="amount">   
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Nhà sản xuất : </label>
                <?php 
                    //lay bien ket noi csdl
                    $conn = Connection::getInstance();
                    //thuc hien truy van
                    $query = $conn->query("select * from nsx");
                    //tra ve tat ca cac ket qua lay duoc
                    $nsx = $query->fetchAll(PDO::FETCH_OBJ);
                 ?>
                <select name="name_nsx" class="form-control col-md-9" style="width:200px;">
                    <?php foreach($nsx as $rows): ?>
                        <option <?php if(isset($record->name_nsx)&&$record->name_nsx == $rows->name): ?> selected <?php endif; ?> value="<?php echo $rows->name; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Giới thiệu : </label>
                <textarea name="description" class="form-control col-md-9"><?php echo isset($record->description)?$record->description:''; ?></textarea>
                <script type="text/javascript">CKEDITOR.replace("description");</script>    
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Chi tiết : </label>
                <textarea name="content" class="form-control col-md-9"><?php echo isset($record->content)?$record->content:''; ?></textarea>
                <script type="text/javascript">CKEDITOR.replace("content");</script>    
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Ảnh : </label>
                <input type="file" name="photo">
            </div>

            <div class="form-group row">
              <div class="col-md-10 text-md-right">
                <button type="submit"class="btn btn-primary col-2 btn-submit" >Cập Nhật</button>
              </div>
            </div>
          </form>
            
    
        </div>
        <div class="modal-footer">
          <a href="index.php?controller=supplies"><button type="button" class="btn btn-danger">Go back</button></a>
        </div>
      </div>
      
    </div>
  
</div>