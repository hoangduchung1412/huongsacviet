<?php 
	include "Models/UsersModel.php";
	class UsersController {
		use UsersModel;
		//ham tao
		public function __construct() {
			//kiem tra user dang nhap chua
			if(isset($_SESSION['username']) == false)
				header('location:index.php?controller=login');
		}
		public function index() {
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 4;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			return View::make("UsersView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function view() {
			//lay id truyen tu url
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$action = "index.php?controller=users&action=view&id=$id";
			//lay mot ban ghi
			$record = $this->modelGetRecord($id);
			return View::make("UsersViewDetail.php",["action"=>$action,"record"=>$record]);
		}
		public function update() {
			//lay id truyen tu url
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$action = "index.php?controller=users&action=updatePost&id=$id";
			//lay mot ban ghi
			$record = $this->modelGetRecord($id);
			return View::make("UsersFormView.php",["action"=>$action,"record"=>$record]);
		}
		public function updatePost() {
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$this->modelUpdate($id);
			header("location:index.php?controller=users");
		}
		public function create() {
			$action = "index.php?controller=users&action=createPost";
			return View::make("UsersFormView.php",["action"=>$action]);
		}
		public function createPost() {
			$this->modelCreate();
			header("location:index.php?controller=users");
		}
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$this->modelDelete($id);
			header("location:index.php?controller=users");
		}
	}
 ?>