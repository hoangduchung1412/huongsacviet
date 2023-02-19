<?php 
	trait SuppliesModel{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			//lay bien truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket nio csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from supplies order by id desc limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			//neu $query->fetchAll() thi ket qua tra ve la mot array
			//neu $query->fetchAll(PDO::FETCH_OBJ) thi ket qua tra ve la mot object
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket nio csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from supplies");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi tuong ung voi id truyen vao
		public function modelGetRecord($id){
			//lay bien ket nio csdl
			$conn = Connection::getInstance();
			//thuc hien truy van -> do co bien truyen tu url vao nen thuc hien prepare de truyen tham so
			$query = $conn->prepare("select * from supplies where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function modelUpdate($id){
			$name = $_POST['name'];
			$category_id = $_POST['category_id'];
			$name_nsx = $_POST['name_nsx'];
			$in_price = $_POST['in_price'];
			$out_price = $_POST['out_price'];
			$weight = $_POST['weight'];
			$amount = $_POST['amount'];
			$description = $_POST['description'];
			$content = $_POST['content'];
  			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("update supplies set name =:var_name, category_id=:var_category_id, name_nsx=:var_name_nsx, in_price=:var_in_price, out_price=:var_out_price, weight=:var_weight, amount=:var_amount , description=:var_description, content=:var_content where id=:var_id");
			$query->execute(["var_id"=>$id,"var_name"=>$name,"var_category_id"=>$category_id, "var_name_nsx"=>$name_nsx, "var_in_price"=>$in_price, "var_out_price"=>$out_price, "var_weight"=>$weight, "var_amount"=>$amount , "var_description"=>$description,"var_content"=>$content]);
			//---
			//neu user upload anh thi thuc hien upload
			$photo = "";
			if($_FILES['photo']['name'] != ""){
				//---
				//lay anh cu de xoa
				$oldPhoto = $conn->query("select photo from supplies where id=$id");
				if($oldPhoto->rowCount() > 0){
					$record = $oldPhoto->fetch(PDO::FETCH_OBJ);
					//xoa anh
					if($record->photo != "" && file_exists("../assets/upload/supplies/".$record->photo))
						unlink("../assets/upload/supplies/".$record->photo);
				}
				//---
				$photo = time()."_".$_FILES['photo']['name'];
				//upload file vao thu muc assets/upload/supplies
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/supplies/$photo");
				$query = $conn->prepare("update supplies set photo = :var_photo where id = :var_id");
				$query->execute(["var_photo"=>$photo,"var_id"=>$id]);
			}
			//---
		}
		public function modelCreate(){
			$name = $_POST['name'];
			$category_id = $_POST['category_id'];
			$name_nsx = $_POST['name_nsx'];
			$in_price = $_POST['in_price'];
			$out_price = $_POST['out_price'];
			$weight = $_POST['weight'];
			$amount = $_POST['amount'];
			$description = $_POST['description'];
			$content = $_POST['content'];
			$photo = "";
			//---
			//neu user upload anh thi thuc hien upload
			$photo = "";
			if($_FILES['photo']['name'] != ""){
				$photo = time()."_".$_FILES['photo']['name'];
				//upload file vao thu muc assets/upload/supplies
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/supplies/$photo");
			}
			//---	
			//echo $price;	
			//update name
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into supplies set name =:var_name, category_id=:var_category_id, name_nsx=:var_name_nsx, in_price=:var_in_price, out_price=:var_out_price, weight=:var_weight, amount=:var_amount , description=:var_description, content=:var_content ,photo = :var_photo");
			$query->execute(["var_name"=>$name,"var_category_id"=>$category_id, "var_name_nsx"=>$name_nsx, "var_in_price"=>$in_price, "var_out_price"=>$out_price, "var_weight"=>$weight, "var_amount"=>$amount , "var_description"=>$description,"var_content"=>$content,"var_photo"=>$photo]);	
		}
		public function modelDelete($id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//---
			//lay anh cu de xoa
			$oldPhoto = $conn->query("select photo from supplies where id=$id");
			if($oldPhoto->rowCount() > 0){
				$record = $oldPhoto->fetch(PDO::FETCH_OBJ);
				//xoa anh
				if($record->photo != "" && file_exists("../assets/upload/supplies/".$record->photo))
					unlink("../assets/upload/supplies/".$record->photo);
			}
			//---
			$query = $conn->prepare("delete from supplies where id = :var_id or category_id = :var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);		
		}
	}
 ?>