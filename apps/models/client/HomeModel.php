<?php 
	class HomeModel{
		public static function GetSlider(){
			$db = Db::GetDb();
			$stmt = $db->prepare('select url from slider');
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}
?>