<?php 
//load noi dung file Layout vao day
    self::$fileLayout = "LayoutView.php";
?>
<div class="modal-dialog">
     <div class="modal-content">
   <div class="modal-header">
     <h4 class="modal-title" id="title"> Thông tin nhà bán lẻ </h4>
   </div>
   <div class="modal-body" >
       <div class="form-group row">
           <label class="col-md-4 text-md-right font-weight-bold" >ID : </label>
           <span class="col-md-6"><?php echo $record->id; ?></span>
       </div>
            
       <div class="form-group">
            <label class="col-md-4 text-md-right font-weight-bold" >Mã nhà bán lẻ : </label>
           <span class="col-md-6"><?php echo $record->manbl; ?></span>
       </div>

       <div class="form-group">
            <label class="col-md-4 text-md-right font-weight-bold" >Tên nhà bán lẻ : </label>
           <span class="col-md-6"><?php echo $record->name; ?></span>
       </div>
       
       <div class="form-group">
            <label class="col-md-4 text-md-right font-weight-bold" >Địa chỉ : </label>
           <span class="col-md-6"><?php echo $record->address; ?></span>
       </div>

       <div class="form-group">
            <label class="col-md-4 text-md-right font-weight-bold" >Email : </label>
           <span class="col-md-6"><?php echo $record->email; ?></span>
       </div>

       <div class="form-group">
            <label class="col-md-4 text-md-right font-weight-bold" >Số điện thoại : </label>
           <span class="col-md-6"><?php echo $record->phone; ?></span>
       </div>

       <div class="form-group">
           <label class="col-md-4 text-md-right font-weight-bold" >Mô tả : </label>
           <span class="col-md-6"><?php echo $record->description; ?></span>
       </div>

   </div>
   <div class="modal-footer ">
     <a href="index.php?controller=nbl"><button type="button" class="btn btn-danger">Go back</button></a>
   </div>
 </div>
</div>