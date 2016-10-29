<?php 
	class CartModel{
		public $id;
		public $customer;
		public $city;
		public $district;
		public $town;
		public $home;
		public $num;
		public $productId;
		public $userId;

		function __construct($id=null,$customer=null,$city=null,$district=null,$town=null,$home=null,$num=null,$productId=null,$userId=null){
			$this->id = $id;
			$this->customer = $customer;
			$this->city = $city;
			$this->district = $district;
			$this->town = $town;
			$this->home = $home;
			$this->num = $num;
			$this->productId = $productId;
			$this->userId = $userId;
		}

		//Lưu Đơn hàng
		public function Save($CartModel){
			$db =Db::GetDb();
			$date = date('Y:m:d');
			$stmt = $db->prepare('insert into carts
									(customer_name,city,district,town,home,num,product_id,user_id,time) 
									values(:customer,:city,:district,:town,:home,:num,:productId,:userId,now())');
			$stmt->bindParam(':customer',$CartModel->customer,PDO::PARAM_STR);
			$stmt->bindParam(':city',$CartModel->city,PDO::PARAM_STR);
			$stmt->bindParam(':district',$CartModel->district,PDO::PARAM_STR);
			$stmt->bindParam(':town',$CartModel->town,PDO::PARAM_STR);
			$stmt->bindParam(':home',$CartModel->home,PDO::PARAM_STR);
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
			$stmt=$db->prepare('select id from carts	where user_id =:userId');
			$stmt->bindParam(':userId',$CartModel->userId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->rowCount();
		}

		//Lấy ra  đơn hàng của 1 khách hàng
		public function GetCart($CartModel,$page){
			$db = Db::GetDb();
			$stmt=$db->prepare('select id,customer_name ,product_id,num ,district,city,town,home,time ,status from carts where user_id =:userId');
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