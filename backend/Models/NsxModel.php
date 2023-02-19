<?php 
	trait NsxModel {
		public function modelRead($recordPerPage) {
			$page = isset($_GET['p']) && $_GET['p'] > 0 ? $_GET['p']-1 : 0;
			$from = $page * $recordPerPage;
			$conn = Connection::getInstance();
			$query = $conn->query("select * from nsx order by id asc limit $from, $recordPerPage");
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		public function modelTotalRecord() {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from nsx");
			return $query->rowCount();
		}
		public function modelGetRecord($id) {
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from nsx where id=:var_id");
			$query->execute(["var_id"=>$id]);
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function modelUpdate($id) {
			$mansx = $_POST['mansx'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update nsx set mansx=:var_mansx, name=:var_name, address=:var_address, email=:var_email, phone=:var_phone where id=:var_id");
			$query->execute(["var_id"=>$id,"var_mansx"=>$mansx, "var_name"=>$name, "var_address"=>$address,"var_email"=>$email, "var_phone"=>$phone]);
		}
		public function modelCreate() {
			$mansx = $_POST['mansx'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into nsx set mansx=:var_mansx, name=:var_name, address=:var_address, email=:var_email, phone=:var_phone");
			$query->execute(["var_mansx"=>$mansx, "var_name"=>$name, "var_address"=>$address,"var_email"=>$email, "var_phone"=>$phone]);
		}
		public function modelDelete($id) {
			$conn = Connection::getInstance();
			$query = $conn->prepare("delete from nsx where id=:var_id");
			$query->execute(["var_id"=>$id]);
		}
	}
 ?>