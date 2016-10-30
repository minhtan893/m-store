<?php 
	class ContactModel{
		public static function GetAll(){
			$db = Db::GetDb();
			$stmt = $db->prepare('select company,phone,address,email,facebook from contact');
			$stmt->execute();
			return $stmt->fetch();		}
	}
?>