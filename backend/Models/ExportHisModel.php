<?php 
	trait ExportHisModel{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			//lay bien truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			$user_id = $_SESSION['user_id'];
			//---
			//lay bien ket nio csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from orders where user_id=$user_id order by id desc limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			//neu $query->fetchAll() thi ket qua tra ve la mot array
			//neu $query->fetchAll(PDO::FETCH_OBJ) thi ket qua tra ve la mot object
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			$user_id = $_SESSION['user_id'];
			//lay bien ket nio csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from orders where user_id=$user_id");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		public function modelGetReCord($id) {
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from orders where id = :var_id");
			$query->execute(["var_id"=>$id]);
			//tra ve ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
		//lay mot ban ghi tuong ung voi id truyen vao
		public function modelGetUser($user_id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from users where id = :var_user_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_user_id"=>$user_id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}	
		public function modelExportHisDetail($order_id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from orderdetails where order_id = :var_order_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_order_id"=>$order_id]);
			//tra ve mot ban ghi
			return $query->fetchAll(PDO::FETCH_OBJ);
		}	
		public function modelGetSupply($supply_id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from supplies where id = :var_supply_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_supply_id"=>$supply_id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function cancel(){
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$this->modelCancel($id);
			header("location:index.php?controller=orders");
		}
	}
 ?>