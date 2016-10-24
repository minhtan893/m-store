<?php 
	class UserController{

		//Kiểm trâ level User
		public static function CheckLevel($userId){
			$user = new UserModel($userId,null,null,null,null);
			$newUser = $user->CheckLevel($user);
			if($newUser->level==1){
				return true;
			}
			else{
				return false;
			}
		}
	}
?>