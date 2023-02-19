<?php 
	//load file model
	include "Models/LoginModel.php";
	class LoginController {
		//ke thua LoginModel
		use LoginModel;
		public function index() {
			//goi view
			return View::make("LoginView.php");
		}
		public function doLogin() {
			$this->modelLogin();
		}
		//dang xuat
		public function logout() {
			//huy bien Session
			unset($_SESSION['username']);
			header("location:index.php");
		}
	}
 ?>