<?php 
//load noi dung file Layout vao day
    self::$fileLayout = "LayoutView.php";
?>
<div class="modal-dialog">
     <div class="modal-content">
   <div class="modal-header">
     <h4 class="modal-title" id="title"> Thông tin tài khoản </h4>
   </div>
   <div class="modal-body" >
       <div class="form-group row">
           <label class="col-md-4 text-md-right font-weight-bold" >ID : </label>
           <span class="col-md-6"><?php echo $record->id; ?></span>
       </div>
            
       <div class="form-group">
            <label class="col-md-4 text-md-right font-weight-bold" >Họ và tên : </label>
           <span class="col-md-6"><?php echo $record->fullname; ?></span>
       </div>

       <div class="form-group">
            <label class="col-md-4 text-md-right font-weight-bold" >Email : </label>
           <span class="col-md-6"><?php echo $record->email; ?></span>
       </div>

       <div class="form-group">
            <label class="col-md-4 text-md-right font-weight-bold" >Trạng thái : </label>
           <span class="col-md-6"><?php echo $record->is_block == 1 ? "Bị khoá" : "Không bị khoá"; ?></span>
       </div>

       <div class="form-group">
            <label class="col-md-4 text-md-right font-weight-bold" >Loại tài khoản : </label>
               <?php if($record->permission == 1):  ?>
                   <span class="col-md-6">Admin</span>
               <?php elseif($record->permission == 2):  ?>
                   <span class="col-md-6">Nhà sản xuất</span>
               <?php else:  ?>
                  <span class="col-md-6">Nhà cung cấp</span>
               <?php endif; ?>
       </div>

       <div class="form-group">
           <label class="col-md-4 text-md-right font-weight-bold" >Username : </label>
           <span class="col-md-6"><?php echo $record->username; ?></span>
       </div>

   </div>
   <div class="modal-footer ">
     <a href="index.php?controller=users"><button type="button" class="btn btn-danger">Go back</button></a>
   </div>
 </div>
</div>