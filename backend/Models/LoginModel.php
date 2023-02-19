<?php 
	trait LoginModel {
		public function modelLogin() {
			if(isset($_POST['btn_submit'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$password = md5($password);
				$conn = Connection::getInstance();
				$query = $conn->prepare("select id,username,password,fullname,is_block,permission,email,phone from users where username=:var_username and password=:var_password");
				//thuc thi truy van
				$query->execute(['var_username'=>$username,'var_password'=>$password]);
				//thuc thi truy van
				if($query->rowCount() > 0) {
					//lay 1 ban ghi
					$result = $query->fetch(PDO::FETCH_OBJ);
					if($password == $result->password) {
						$_SESSION['user_id'] = $result->id;
						$_SESSION['username'] = $result->username;
						$_SESSION['fullname'] = $result->fullname;
						$_SESSION['email'] = $result->email;
						$_SESSION['phone'] = $result->fullname;
						$_SESSION['is_block'] = $result->is_block;
						$_SESSION['permission'] = $result->permission;
					}
					if($_SESSION['is_block']==1) {
 						echo "Tài khoản của bạn đã bị tạm khoá";
	 				} else {
	 					header('location:index.php');
	 				}
				}
			}
		}
	}
 ?>