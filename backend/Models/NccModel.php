<?php 
	trait NccModel {
		public function modelRead($recordPerPage) {
			$page = isset($_GET['p']) && $_GET['p'] > 0 ? $_GET['p']-1 : 0;
			$from = $page * $recordPerPage;
			$conn = Connection::getInstance();
			$query = $conn->query("select * from ncc order by id asc limit $from, $recordPerPage");
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		public function modelTotalRecord() {
			$conn = Connection::getInstance();
			$query = $conn->query("select * from ncc");
			return $query->rowCount();
		}
		public function modelGetRecord($id) {
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from ncc where id=:var_id");
			$query->execute(["var_id"=>$id]);
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function modelUpdate($id) {
			$mancc = $_POST['mancc'];
			$name = $_POST['name'];
			$description = $_POST['description'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update ncc set mancc=:var_mancc, name=:var_name, description=:var_description, address=:var_address,email=:var_email, phone=:var_phone where id=:var_id");
			$query->execute(["var_mancc"=>$mancc, "var_id"=>$id,"var_name"=>$name, "var_description"=>$description, "var_address"=>$address,"var_email"=>$email, "var_phone"=>$phone]);
		}
		public function modelCreate() {
			$mancc = $_POST['mancc'];
			$name = $_POST['name'];
			$description = $_POST['description'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into ncc set mancc=:var_mancc, name=:var_name, description=:var_description, address=:var_address,email=:var_email, phone=:var_phone");
			$query->execute(["var_mancc"=>$mancc, "var_name"=>$name, "var_description"=>$description, "var_address"=>$address,"var_email"=>$email, "var_phone"=>$phone]);
		}
		public function modelDelete($id) {
			$conn = Connection::getInstance();
			$query = $conn->prepare("delete from ncc where id=:var_id");
			$query->execute(["var_id"=>$id]);
		}
	}
 ?>