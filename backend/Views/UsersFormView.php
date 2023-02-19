<?php 
//load file layout vao day
self::$fileLayout = "LayoutView.php";
?>
<div class="">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title">Cập nhật thông tin tài khoản</h4>
        </div>
        <div class="modal-body " >
        
          <form method="post" action="<?php echo $action; ?>">
                
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Họ và tên : </label>
                <input type="text" class="col-md-6 form-control" name="fullname" value="<?php echo isset($record->fullname) ? $record->fullname :''; ?>">
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Username : </label>
                <input type="text" class="col-md-6 form-control" name="username" value="<?php echo isset($record->username) ? $record->username :''; ?>">
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Password : </label>
                <input type="password" class="col-md-6 form-control" name="password" <?php if(isset($record->password)): ?> placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" <?php else: ?> required <?php endif; ?>>
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Email : </label>
                <input type="text" class="col-md-6 form-control" name="email" value="<?php echo isset($record->email) ? $record->email:''; ?>">   
            </div>

            <div class="form-group row">
                <!-- <label class="col-md-4 text-md-right font-weight-bold" >Block tài khoản : </label>
                <input type="checkbox" class="form-control" name="is_block"> -->
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <input type="checkbox" name="is_block" <?php if(isset($record->is_block) && $record->is_block == 1): ?> checked <?php endif; ?>> <label class="font-weight-bold" >&nbsp;&nbsp;Block tài khoản</label>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Chức vụ : </label>
                <select class="col-md-6 form-control" name="permission" class="form-control">
                  <option value="0"></option>
                    <option <?php if(isset($record->permission)&&$record->permission == 1): ?> selected <?php endif; ?> value="1"><?php echo "Admin"; ?></option>
                    <option <?php if(isset($record->permission)&&$record->permission == 2): ?> selected <?php endif; ?> value="2"><?php echo "Nhà sản xuất"; ?></option>
                    <option <?php if(isset($record->permission)&&$record->permission == 3): ?> selected <?php endif; ?> value="3"><?php echo "Nhà phân phối"; ?></option>
                    <option <?php if(isset($record->permission)&&$record->permission == 4): ?> selected <?php endif; ?> value="4"><?php echo "Nhân viên"; ?></option>
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
          <a href="index.php?controller=users"><button type="button" class="btn btn-danger">Go back</button></a>
        </div>
      </div>
      
    </div>
  
</div>