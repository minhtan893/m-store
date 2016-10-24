<?php 
	class UserModel{
		public $id;
		public $email;
		public $username;
		public $level;

		public $password;

		//Hàm set giá trị khởi tạo
		function __construct($id=null,$username=null,$email=null,$password=null,$level=null){
			$this->id = $id;
			$this->username = $username;
			$this->level = $level;
			$this->email = $email;
			$this->password = $password;
		}
		//Kiểm tra tài khoản Login
		public static function CheckUser($UserModel){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id,password ,username from users
									where email = :email ');
			$stmt->bindParam(':email',$UserModel->email, PDO::PARAM_STR);
			$stmt->execute();
			$rs = $stmt->fetch();
			if($stmt->rowCount()>0){
				return new UserModel($rs['id'],$rs['username'],null,$rs['password'],null);
			}
			else {
				return false;
			}
		}
		//KKiểm tra email đã tồn tại chưa
		public function EmailExits($UserModel){
			$db = Db::GetDb();
			$stmt = $db->prepare('select email from users
									where email = :email');
			$stmt->bindParam(':email',$UserModel->email, PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount()>0){
				return true;
			}
			else {
				return false;
			}
		}
		//Lưu User 
		public function Save($UserModel){
			$db = Db::GetDb();
			if($UserModel->id==null){//Nếu id của user là null thì tạo mới
				$stmt = $db->prepare('insert into users(id,username,email,password,level)
							values(:id,:username,:email,:password,0)');
			}
			else{
				$stmt = $db->prepare('update users 
						set username=:username,email=:email,password=:password
						where id=:id');
			}
			$stmt->bindParam(':id',$UserModel->id,PDO::PARAM_INT);
			$stmt->bindParam(':username',$UserModel->username,PDO::PARAM_STR);
			$stmt->bindParam(':email',$UserModel->email,PDO::PARAM_STR);
			$stmt->bindParam(':password',$UserModel->password,PDO::PARAM_STR);
			if($stmt->execute()){
				return $db->lastInsertId();
			}
			else{
				return false;
			}
		}
		//Lấy ra 1 User 
		public function GetOne($UserModel){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id,username from users
									where id = :id ');
			$stmt->bindParam(':id',$UserModel->id, PDO::PARAM_INT);
			$stmt->execute();
			if($stmt->rowCount()>0){
				$rs = $stmt->fetch();
				return new UserModel($rs['id'],$rs['username'],null,null,null);
			}
			else {
				return false;
			}
		}
	}
?>