<?php 
	include "Models/NccModel.php";
	class NccController {
		use NccModel;
		public function __construct() {
			if(isset($_SESSION['username']) == false)
				header("location:index.php?controller=login");
		}
		public function index() {
			$recordPerPage = 10;
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			$data = $this->modelRead($recordPerPage);
			return View::make("NccView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function view() {
			//lay id truyen tu url
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$action = "index.php?controller=nsx&action=view&id=$id";
			//lay mot ban ghi
			$record = $this->modelGetRecord($id);
			return View::make("NccDetailView.php",["action"=>$action,"record"=>$record]);
		}
		public function update() {
			//lay id truyen tu url
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$action = "index.php?controller=ncc&action=updatePost&id=$id";
			//lay mot ban ghi
			$record = $this->modelGetRecord($id);
			return View::make("NccFormView.php",["action"=>$action,"record"=>$record]);
		}
		public function updatePost() {
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$this->modelUpdate($id);
			header("location:index.php?controller=ncc");
		}
		public function create() {
			$action = "index.php?controller=ncc&action=createPost";
			return View::make("NccFormView.php",["action"=>$action]);
		}
		public function createPost() {
			$this->modelCreate();
			header("location:index.php?controller=ncc");
		}
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$this->modelDelete($id);
			header("location:index.php?controller=ncc");
		}
	}
 ?>