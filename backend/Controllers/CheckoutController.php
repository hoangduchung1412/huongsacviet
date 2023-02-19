<?php 
	//include file model vao day
	include "models/CheckoutModel.php";
	class CheckoutController {
		//ke thua CheckoutModel
		use CheckoutModel;
		public function index() {
			//goi view
			return View::make("CheckoutView.php");
		}
		//thanh toan gio hang
		public function checkout() {
			//kiem tra neu user chua dang nhap thi yeu cau dang nhap
			if(isset($_SESSION['username']) == false)
				header('location:index.php?controller==login');
			else {
				//goi ham cartCheckout
				$this->cartCheckout();
				header('location:index.php?controller=exporthis');
			}
		}
	}
?>