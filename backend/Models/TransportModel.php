<?php 
	trait TransportModel {
		public function modelRead($recordPerPage) {
			$page = isset($_GET['p']) && $_GET['p'] > 0 ? $_GET['p']-1 : 0;
			$from = $page * $recordPerPage;
			$conn = Connection::getInstance();
			$query = $conn->query("select * from transport order by id asc limit $from, $recordPerPage");
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		public function modelTotalRecord() {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from transport");
			return $query->rowCount();
		}
		public function modelGetRecord($id) {
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from transport where id=:var_id");
			$query->execute(["var_id"=>$id]);
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function modelUpdate($id) {
			$code = $_POST['code'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$price = $_POST['price'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update transport set code=:var_code, name=:var_name, address=:var_address, email=:var_email, phone=:var_phone, price=:var_price where id=:var_id");
			$query->execute(["var_id"=>$id,"var_code"=>$code, "var_name"=>$name, "var_address"=>$address,"var_email"=>$email, "var_phone"=>$phone, "var_price"=>$price]);
		}
		public function modelCreate() {
			$code = $_POST['code'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$price = $_POST['price'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into transport set code=:var_code, name=:var_name, address=:var_address, email=:var_email, phone=:var_phone, price=:var_price");
			$query->execute(["var_code"=>$code, "var_name"=>$name, "var_address"=>$address,"var_email"=>$email, "var_phone"=>$phone, "var_price"=>$price]);
		}
		public function modelDelete($id) {
			$conn = Connection::getInstance();
			$query = $conn->prepare("delete from transport where id=:var_id");
			$query->execute(["var_id"=>$id]);
		}
	}
 ?>