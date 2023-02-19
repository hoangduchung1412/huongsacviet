<?php 
	include "models/CartModel.php";
	class CartController {
		use CartModel;
		//ham tao su dung de kiem tra va khoi tao gio hang
		public function __construct() {
			//kiem tra gio hang neu chua ton tai thi khoi tao no
			if(isset($_SESSION['cart']) == false)
				$_SESSION['cart'] = array();
		}
		//hien thi danh sach san pham trong gio hang
		public function index() {
			return View::make("CartView.php");
		}
		public function create() {
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			//goi ham trong model de them phan tu vao gio hang
			$this->cartAdd($id);
			header("location:index.php?controller=cart");
		}
		//xoa san pham khoi gio hang
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			//goi ham trong model de xoa san pham khoi gio hang
			$this->cartDelete($id);
			header("location:index.php?controller=cart");
		}
		//xoa toan bo san pham khoi gio hang
		public function destroy() {
			$this->cartDestroy();
			header("location:index.php?controller=cart");
		}
		//cap nhat so luong san pham trong gio hang
		public function update() {
			foreach($_SESSION['cart'] as $supply) {
				$name = 'supply_'.$supply['id'];
				$number = $_POST[$name];
				$this->cartUpdate($supply['id'],$number);
			}
			header('location:index.php?controller=cart');
		}
	}
 ?>