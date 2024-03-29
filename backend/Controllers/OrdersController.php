<?php 
	//include file model vao day
	include "models/OrdersModel.php";
	class OrdersController{
		//ke thua class OrdersModel
		use OrdersModel;
		//ham tao duoc khoi tao dau tien
		public function __construct(){
			//kiem tra user dang nhap chua
			if(isset($_SESSION['username']) == false)
				header('location:index.php?controller=login');
		}
		public function index(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			return View::make("OrdersView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function detail(){
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$data = $this->modelOrdersDetail($id);
			//goi view, truyen du lieu ra view
			return View::make("OrdersDetailView.php",["data"=>$data,"id"=>$id]);
		}
		public function delivery(){
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$this->modelDelivery($id);
			header("location:index.php?controller=orders");
		}
		public function cancel(){
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$this->modelCancel($id);
			header("location:index.php?controller=orders");
		}
	}
 ?>