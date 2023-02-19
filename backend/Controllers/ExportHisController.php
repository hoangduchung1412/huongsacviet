<?php 
	//include file model vao day
	include "models/ExportHisModel.php";
	class ExportHisController{
		//ke thua class ExportHisModel
		use ExportHisModel;
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
			return View::make("ExportHisView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function detail(){
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$data = $this->modelExportHisDetail($id);
			//goi view, truyen du lieu ra view
			return View::make("ExportHisDetailView.php",["data"=>$data,"id"=>$id]);
		}
		public function modelCancel($id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("update orders set status = 2 where id = $id");
		}
	}
 ?>