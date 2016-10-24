<?php 
class ContactModel{
	public $company;
	public $address;
	public $phone;
	public $fb;
	public $email;

	function __construct($company=null,$address=null,$phone=null,$fb=null,$email=null){
		$this->company = $company;
		$this->address = $address;
		$this->phone = $phone;
		$this->fb = $fb;
		$this->email = $email;
	}
	public function Get(){
		$db = Db::GetDb();
		$stmt = $db->prepare('select * from contact ');
		$stmt->execute();
		return $stmt->fetch();
	}
	

	public function Save($ContactModel){
		$db = Db::GetDb();
		$stmt = $db->prepare('update contact 
			set company = :company,address=:address,phone=:phone,facebook=:fb,email=:email');
		$stmt->bindParam(':company',$ContactModel->company,PDO::PARAM_STR);
		$stmt->bindParam(':address',$ContactModel->address,PDO::PARAM_STR);
		$stmt->bindParam(':phone',$ContactModel->phone,PDO::PARAM_STR);
		$stmt->bindParam(':fb',$ContactModel->fb,PDO::PARAM_STR);
		$stmt->bindParam(':email',$ContactModel->email,PDO::PARAM_STR);
		$stmt->execute();
		return true;
	}
	
}
?>