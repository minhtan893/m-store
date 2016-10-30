<?php 
	class ContactController{
		public static function Index(){
			$contact = ContactModel::GEtAll();
			require_once('./apps/views/client/contact.php');
		}
	}
?>