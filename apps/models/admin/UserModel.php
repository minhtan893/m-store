<?php 

	class UserModel{
		public $id;
		public $username;
		public $email;
		public $password;
		public $level;
		
		//Hàm set giá trị khởi tạo
		function __construct($id=null,$username=null,$email=null,$password=null,$level=null){
			$this->id = $id;
			$this->username = $username;
			$this->level = $level;
			$this->email = $email;
			$this->password = $password;
		}
		//Kiểm tra level
		public function CheckLevel($UserModel){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id, username,level from users
								where id=:userId');
			$stmt->bindParam(':userId',$UserModel->id,PDO::PARAM_INT);
			$stmt->execute();
			if($stmt->rowCount()>0){
				$rs = $stmt->fetch();
				return new UserModel($rs['id'],$rs['username'],null,null,$rs['level']);
			}
			else{
				return false;
			}
		}
	}
?>