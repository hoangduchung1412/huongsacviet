<?php 
	class HomeController {
		//ham khoi tao dau tien
		public function __construct() {
			if(isset($_SESSION['username']) == false)
				header('location:index.php?controller=login');
		}
		public function index() {
			//load view
			return View::make("HomeView.php");
		}
	}
?>