<?php 
	class CategoryController{
		
		//Lấy dữ liệu để show menu
		public static function GetCateMenu(){
			 return CategoryModel::GetAllName();
		}

		//Show dữ liệu một danh mục
		public static function Id($id){
			//kiểm trâ name có tồn tại không
			$check = CategoryModel::CheckName($id);
			if($check!=false){
				$id = $check['id'];
				//Lấy số trang sản phẩm
				$pageLimit = Call('Product','GetLimit',$id);
				//Gọi view hiển thị
				require_once('./apps/views/client/onecate.php');
			}
			else{
				Call("Home","Index");
			}
		}

		//search
	public static function Search($query){
		$id = CategoryModel::Search($query);
		if($id!=null){
			return $id['id'];
		}
		else{
			return null;
		}
	}

	//GEt name
	public static function GetName($id){
		$name = CategoryModel::GetName($id);
		return $name;
	}
	}
?>