<?php 
	trait UsersModel {
		//lay ve danh sach ban ghi
		public function modelRead($recordPerPage) {
			//lay bien truyen tu url
			$page = isset($_GET['p']) && $_GET['p'] > 0 ? $_GET['p']-1 : 0;
			$from = $page * $recordPerPage;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->query("select * from users order by id asc limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		//tinh tong so ban ghi
		public function modelTotalRecord() {
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from users");
			return $query->rowCount();
		}
		//lay mot ban ghi tuong ung voi id truyen vao
		public function modelGetReCord($id) {
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from users where id = :var_id");
			$query->execute(["var_id"=>$id]);
			//tra ve ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function modelUpdate($id) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$is_block = isset($_POST["is_block"]) ? 1 : 0;
			$permission = $_POST['permission'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update users set username=:var_username, fullname=:var_fullname, email=:var_email, is_block=:var_is_block, permission=:var_permisson where id=:var_id");
			$query->execute(["var_id"=>$id,"var_username"=>$username, "var_fullname"=>$fullname, "var_email"=>$email, "var_is_block"=>$is_block, "var_permisson"=>$permission]);
			if($password != "") {
				//ma hoa password
				$password = md5($password);
				$query = $conn->prepare('update users set password = :var_password where id=:var_id');
				//thuc thi truy van, co tham so truyen vao cau lenh sql
				$query->execute(['var_id'=>$id,'var_password'=>$password]);
			}
		}
		public function modelCreate() {
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$is_block = isset($_POST["is_block"]) ? 1 : 0;
			$permission = $_POST['permission'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into users set username=:var_username, password=:var_password, fullname=:var_fullname, email=:var_email, is_block=:var_is_block, permission=:var_permisson");
			$query->execute(["var_username"=>$username, "var_password"=>$password,
			 "var_fullname"=>$fullname, "var_email"=>$email, "var_is_block"=>$is_block, "var_permisson"=>$permission]);
		}
		public function modelDelete($id) {
			$conn = Connection::getInstance();
			$query = $conn->prepare("delete from users where id=:var_id");
			$query->execute(["var_id"=>$id]);
		}
	}
 ?>