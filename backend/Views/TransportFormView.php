<?php 
//load file layout vao day
self::$fileLayout = "LayoutView.php";
?>
<div class="">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title">Cập nhật thông tin đơn vị vận chuyển</h4>
        </div>
        <div class="modal-body " >
        
          <form method="post" action="<?php echo $action; ?>">
                
            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Mã đơn vị : </label>
                <input type="text" class="col-md-9 form-control" name="code" value="<?php echo isset($record->code) ? $record->code :''; ?>">
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Phương thức vận chuyển : </label>
                <input type="text" class="col-md-9 form-control" name="name" value="<?php echo isset($record->name) ? $record->name :''; ?>">
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Địa chỉ : </label>
                <input type="text" class="col-md-9 form-control" name="address" value="<?php echo isset($record->address) ? $record->address :''; ?>">
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Email : </label>
                <input type="text" class="col-md-9 form-control" name="email" value="<?php echo isset($record->email) ? $record->email:''; ?>">   
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Số điện thoại : </label>
                <input type="text" class="col-md-9 form-control" name="phone" value="<?php echo isset($record->phone) ? $record->phone:''; ?>">   
            </div>

            <div class="form-group row">
                <label class="col-md-2 text-md-right font-weight-bold" >Giá vận chuyển : </label>
                <input type="text" class="col-md-9 form-control" name="price" value="<?php echo isset($record->price) ? $record->price:''; ?>">   
            </div>

            <div class="form-group row">
              <div class="col-md-10 text-md-right" style="margin-top: 10px;">
                <button type="submit"class="btn btn-primary col-2 btn-submit" >Cập Nhật</button>
              </div>
            </div>
          </form>
            
    
        </div>
        <div class="modal-footer">
          <a href="index.php?controller=transport"><button type="button" class="btn btn-danger">Go back</button></a>
        </div>
      </div>
      
    </div>