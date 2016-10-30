<?php 
class CartModel{
	public $id;
	public $productId;
	public $num;
	public $price;
	public $userID;
	public $customer;
	public $address;
	public $time;
	public $status;

	function __construct($id=null,$productId=null,$num=null,$price=null,$userID=null,$customer=null,$address=null,$time=null,$status=null){
		$this->id = $id;
		$this->productId = $productId;
		$this->num = $num;
		$this->price = $price;
		$this->userID = $userID;
		$this->customer = $customer;
		$this->address = $address;
		$this->time = $time;
		$this->status = $status;
	}

		//Lấy ra tổng số danh mục
	public function GetLimit(){
		$db = Db::GetDb();
		$stmt = $db->prepare('select id from carts');
		$stmt->execute();
		return $stmt->rowCount();
	}

		//Lấy ra danh mục theo trang
	public function GetCate($startIndex){
		$db = Db::GetDb();
		$stmt= $db->prepare('select id,product_id,user_id,customer_name,num,price,address,time ,status from carts
				order by id DESC
				limit :startIndex,8');
		$stmt->bindParam(':startIndex',$startIndex,PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$cartLimit = $stmt->rowCount();
			$cartList = $stmt->fetchAll();
			$arr = [];
			array_push($arr, $cartList);
			array_push($arr, $cartLimit);
			return $arr;
		}
		else{
			return false;
		}
	}

	//cập nhật
	public function Update($CartModel){
		$db = Db::GetDb();
		$stmt = $db->prepare('update carts set status =:status where id=:id');
		$stmt->bindParam(':id',$CartModel->id,PDO::PARAM_INT);
		$stmt->bindParam(':status',$CartModel->status,PDO::PARAM_INT);
		$stmt->execute();
	}
}
?>