<?php 
//load file layout vao day
self::$fileLayout = "LayoutView.php";
?>
<div class="">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title">Cập nhật thông tin nhà bán lẻ</h4>
        </div>
        <div class="modal-body " >
        
          <form method="post" action="<?php echo $action; ?>">
                
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Mã nhà bán lẻ : </label>
                <input type="text" class="col-md-6 form-control" name="manbl" value="<?php echo isset($record->manbl) ? $record->manbl :''; ?>">
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Tên nhà bán lẻ : </label>
                <input type="text" class="col-md-6 form-control" name="name" value="<?php echo isset($record->name) ? $record->name :''; ?>">
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Địa chỉ : </label>
                <input type="text" class="col-md-6 form-control" name="address" value="<?php echo isset($record->address) ? $record->address :''; ?>">
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Email : </label>
                <input type="text" class="col-md-6 form-control" name="email" value="<?php echo isset($record->email) ? $record->email:''; ?>">   
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Số điện thoại : </label>
                <input type="text" class="col-md-6 form-control" name="phone" value="<?php echo isset($record->phone) ? $record->phone:''; ?>">   
            </div>

            <div class="row" style="margin-top:5px;">
                <label class="col-md-4 text-md-right font-weight-bold" >Giới thiệu : </label>
                <div class="col-md-6">
                    <textarea name="description" class="form-control"><?php echo isset($record->description)?$record->description:''; ?></textarea>
                    <script type="text/javascript">CKEDITOR.replace("description");</script>
                </div>
            </div>            

            <div class="form-group row">
              <div class="col-md-10 text-md-right" style="margin-top: 10px;">
                <button type="submit"class="btn btn-primary col-2 btn-submit" >Cập Nhật</button>
              </div>
            </div>
          </form>
            
    
        </div>
        <div class="modal-footer">
          <a href="index.php?controller=nbl"><button type="button" class="btn btn-danger">Go back</button></a>
        </div>
      </div>
      
    </div>