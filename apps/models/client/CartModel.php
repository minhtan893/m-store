<?php 
	class CartModel{
		public $id;
		public $customer;
		public $address;
		public $price;
		public $num;
		public $productId;
		public $userId;

		function __construct($id=null,$customer=null,$address=null,$price=null,$num=null,$productId=null,$userId=null){
			$this->id = $id;
			$this->customer = $customer;
			$this->address = $address;
			$this->price = $price;
			$this->num = $num;
			$this->productId = $productId;
			$this->userId = $userId;
			$this->productId = $productId;
		}

		//Lưu Đơn hàng
		public function Save($CartModel){
			$db =Db::GetDb();
			$stmt = $db->prepare('insert into carts
									(customer_name,address,price,num,product_id,user_id,time) 
									values(:customer,:address,:price,:num,:productId,:userId,now())');
			$stmt->bindParam(':customer',$CartModel->customer,PDO::PARAM_STR);
			$stmt->bindParam(':address',$CartModel->address,PDO::PARAM_STR);
			$stmt->bindParam(':price',$CartModel->price,PDO::PARAM_INT);
			$stmt->bindParam(':num',$CartModel->num,PDO::PARAM_INT);
			$stmt->bindParam(':productId',$CartModel->productId,PDO::PARAM_INT);
			$stmt->bindParam(':userId',$CartModel->userId,PDO::PARAM_INT);
			if($stmt->execute()){
				return true;	
			}
		}

		//Lấy ra tổng số đơn hàng của 1 khách hàng
		public function GetLimit($CartModel){
			$db = Db::GetDb();
			$stmt=$db->prepare('select id from carts where user_id =:userId');
			$stmt->bindParam(':userId',$CartModel->userId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->rowCount();
		}

		//Lấy ra  đơn hàng của 1 khách hàng
		public function GetCart($CartModel,$page){
			$db = Db::GetDb();
			$stmt=$db->prepare('select id,customer_name ,product_id,num ,price,address,time ,status 
				from carts where user_id =:userId');
			$stmt->bindParam(':userId',$CartModel->userId,PDO::PARAM_INT);
			$stmt->execute();
			return array_values($stmt->fetchAll());
		}
		//Lấy ra status đơn hàng của 1 khách hàng
		public function GetStatus($CartModel){
			$db = Db::GetDb();
			$stmt=$db->prepare('select num,product_id,status from carts where id =:Id');
			$stmt->bindParam(':Id',$CartModel->id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}
		//Xoá đơn hàng của 1 khách hàng
		public function Del($CartModel){
			$db = Db::GetDb();
			$stmt=$db->prepare('delete from carts where id =:Id');
			$stmt->bindParam(':Id',$CartModel->id,PDO::PARAM_INT);
			$stmt->execute();
		}

		//Lấy ra thời gian
		public function GetTime($CartModel){
			$db = Db::GetDb();
			$stmt=$db->prepare('select time,status from carts where user_id =:Id');
			$stmt->bindParam(':Id',$CartModel->userId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}
		//Update thời gian
		public function UpdateStatus($CartModel,$status){
			$db = Db::GetDb();
			$stmt=$db->prepare('update carts 
				set status = :status
				where user_id =:Id');
			$stmt->bindParam(':Id',$CartModel->userId,PDO::PARAM_INT);
			$stmt->bindParam(':status',$status,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}
	}
?>