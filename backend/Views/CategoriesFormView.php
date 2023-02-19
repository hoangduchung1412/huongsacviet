<?php 
//load file layout vao day
self::$fileLayout = "LayoutView.php";
?>
<div class="">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title">Cập nhật thông tin danh mục</h4>
        </div>
        <div class="modal-body " >
        
          <form method="post" action="<?php echo $action; ?>">
                
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Name : </label>
                <input type="text" name="name" class="col-md-6 form-control" value="<?php echo isset($record->name)?$record->name:''; ?>" required>
            </div>

            <?php 
                //lay bien ket noi csdl
                $conn = Connection::getInstance();
                //thuc hien truy van
                $query = $conn->query("select * from categories where parent_id = 0 order by id desc");
                //lay tat ca cac ket qua tra ve
                $categories = $query->fetchAll(PDO::FETCH_OBJ);
             ?>
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Parent : </label>
                <select name="parent_id" class="col-md-6">
                    <option value="0"></option>
                    <?php foreach($categories as $rows): ?> 
                        <option <?php if(isset($record->parent_id) && $record->parent_id == $rows->id): ?> selected <?php endif ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group row">
              <div class="col-md-10 text-md-right">
                <button type="submit"class="btn btn-primary col-4 btn-submit" >Cập Nhật</button>
              </div>
            </div>
          </form>
            
    
        </div>
        <div class="modal-footer">
          <a href="index.php?controller=categories"><button type="button" class="btn btn-danger">Go back</button></a>
        </div>
      </div>
      
    </div>
  
</div>