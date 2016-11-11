<?php 
	class ContactController{
		public static function Index(){
			$contact = ContactModel::Get();
			require_once('../apps/views/admin/contact.php');
		}
		//Thay doi
		public static function Update(){
			if (isset($_POST['companyName']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['fb']) && isset($_POST['email'])) {
				$company = $_POST['companyName']; 
				$address = $_POST['address']; 
				$phone = $_POST['phone']; 
				$fb = $_POST['fb']; 
				$email = $_POST['email']; 
				$contact = new ContactModel($company,$address,$phone,$fb,$email);
				if($contact->Save($contact)){
					header("location: ./Index");
				}
			}
		}
	}
?>