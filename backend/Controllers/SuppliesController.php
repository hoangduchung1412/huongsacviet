<?php 
	//include file model vao day
	include "Models/SuppliesModel.php";
	class SuppliesController {
		//ke thua SuppliesModel
		use SuppliesModel;
		//ham tao
		public function __construct() {
			//kiem tra user dang nhap chua
			if(isset($_SESSION['username']) == false)
					header('location:index.php?controller=login');
		}
		public function index() {
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			return View::make("SuppliesView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function view() {
			//lay id truyen tu url
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$action = "index.php?controller=users&action=view&id=$id";
			//lay mot ban ghi
			$record = $this->modelGetRecord($id);
			return View::make("SuppliesDetailView.php",["action"=>$action,"record"=>$record]);
		}
		//sua ban ghi
		public function update() {
			//lay id truyen vao tu url
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$action = "index.php?controller=supplies&action=updatePost&id=$id";
			//lay mot ban ghi
			$record = $this->modelGetRecord($id);
			//goi view, truyen du lieu ra view
			return View::make('SuppliesFormView.php',['action'=>$action,'record'=>$record]);
		}
		//khi an nut submit update ban ghi
		public function updatePost() {
			//lay id truyen tu url
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			//goi ham modelUpdate de update ban ghi
			$this->modelUpdate($id);
			//quay tro lai trang supplies
			header('location:index.php?controller=supplies');
		}

		//sua ban ghi
		public function create(){
			//tao bien $action de dua vao thuoc tinh action cua the form
			$action = "index.php?controller=supplies&action=createPost";
			//goi view, truyen du lieu ra view
			return View::make('SuppliesFormView.php',["action"=>$action]);
		}
		//khi an nut submit (create ban ghi)
		public function createPost(){
			//goi ham modelCreate de update ban ghi
			$this->modelCreate();
			//quay tro lai trang supplies
			header("location:index.php?controller=supplies");
		}
		//xoa ban ghi
		public function delete(){
			//lay id truyen tu url
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham xoa ban ghi
			$this->modelDelete($id);
			//quay tro lai trang supplies
			header("location:index.php?controller=supplies");
		}
	}
 ?>