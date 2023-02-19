<?php 
	trait CheckoutModel {
		//=============
		//checkout
		public function cartCheckOut(){
			$conn = Connection::getInstance();			
			//lay id vua moi insert
			$user_id = $_SESSION["user_id"];
			//---
			//---
			//insert ban ghi vao orders, lay order_id vua moi insert
			//lay tong gia cua gio hang
			$price = $this->cartTotal();
			$query = $conn->prepare("insert into orders set user_id=:user_id, date=now(), price=:price");
			$query->execute(["user_id"=>$user_id,"price"=>$price]);
			//lay id vua moi insert
			$order_id = $conn->lastInsertId();
			//---
			//duyet cac ban ghi trong session array de insert vao orderdetails
			foreach($_SESSION["cart"] as $supply){
				$query = $conn->prepare("insert into orderdetails set order_id=:order_id, supply_id=:supply_id, price=:price, quantity=:quantity");
				$query->execute(array("order_id"=>$order_id,"supply_id"=>$supply["id"],"price"=>$supply["price"],"quantity"=>$supply["number"]));
			}
			//xoa gio hang
			unset($_SESSION["cart"]);
		}
		//=============
		public function cartTotal(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $supply){
		        $total += $supply['price'] * $supply['number'];
		    }
		    return $total;
		}
	}
 ?>
