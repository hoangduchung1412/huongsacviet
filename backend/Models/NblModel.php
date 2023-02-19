<?php 
	trait NblModel {
		public function modelRead($recordPerPage) {
			$page = isset($_GET['p']) && $_GET['p'] > 0 ? $_GET['p']-1 : 0;
			$from = $page * $recordPerPage;
			$conn = Connection::getInstance();
			$query = $conn->query("select * from nbl order by id asc limit $from, $recordPerPage");
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		public function modelTotalRecord() {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from nbl");
			return $query->rowCount();
		}
		public function modelGetRecord($id) {
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from nbl where id=:var_id");
			$query->execute(["var_id"=>$id]);
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function modelUpdate($id) {
			$manbl = $_POST['manbl'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$description = $_POST['description'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update nbl set manbl=:var_manbl, name=:var_name, address=:var_address, phone=:var_phone, email=:var_email, description=:var_description where id=:var_id");
			$query->execute(["var_id"=>$id,"var_manbl"=>$manbl, "var_name"=>$name, "var_address"=>$address, "var_phone"=>$phone, "var_email"=>$email, "var_description"=>$description]);
		}
		public function modelCreate() {
			$manbl = $_POST['manbl'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$description = $_POST['description'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into nbl set manbl=:var_manbl, name=:var_name, address=:var_address, phone=:var_phone, email=:var_email, description=:var_description");
			$query->execute(["var_manbl"=>$manbl, "var_name"=>$name, "var_address"=>$address, "var_phone"=>$phone, "var_email"=>$email, "var_description"=>$description]);
		}
		public function modelDelete($id) {
			$conn = Connection::getInstance();
			$query = $conn->prepare("delete from nbl where id=:var_id");
			$query->execute(["var_id"=>$id]);
		}
	}
 ?>