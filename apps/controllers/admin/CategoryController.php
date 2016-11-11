<?php 
class CategoryController{
		//Chạy trang chính Danh mục
	public static function Index(){
		//Lấy tổng số danh mục
		$cateLimit = CategoryModel::GetLimit();
		if($cateLimit % 8==0){
			$catePage = $cateLimit/8;
		}
		else{
			$catePage = ((int)($cateLimit/8)) +1;
		}
		//gọi view
		require_once('../apps/views/admin/all-cate.php');
	}
	//Lấy ra tổng số id , name của danh mục 
	public static function GetAll(){
		$cate = CategoryModel::GetCate(-1);
		$cateList = $cate->cateList;
		$cateLimit = $cate->cateLimit;
		require_once('../apps/views/admin/add-product.php');
	}	
	//Phân trang 
	public static function GetCate(){
			//Tổng số trang
		$cateLimit = CategoryModel::GetLimit();
		if($cateLimit % 8==0){
			$catePage = $cateLimit/8;
		}
		else{
			$catePage = (int)($cateLimit/8) +1;
		}
		if(isset($_POST['page'])){
			$page = $_POST['page'];
				//Lấy sản phẩm bắt đẩu của trang
			$startIndex =$page*8-8;
				//Lấy ra thông tin danh mục trên 1 trang
			$cate = CategoryModel::GetCate($startIndex);
				//Lấy số lượng sản phẩm của 1 danh mục
			$cateList = self::AllProductLimit(array_values($cate->cateList),$cate->cateLimit);
			echo json_encode($cateList);	
		}
	}

		//lấy số lượng sản phẩm trên toàn danh mục
	public static function AllProductLimit($cateList,$cateLimit){
		for ($i=0; $i < $cateLimit; $i++) { 
			$cateId = $cateList[$i][0];
			$productLimit = Call('Product','GetLimitByCate',$cateId	);
			array_push($cateList[$i], $productLimit);
		}
		return $cateList;
	}
		//Lâý số lượng sản phẩm trên 1 danh mục
	public static function ProductLimit($cateId){
		$productLimit = Call('Product','GetLimitByCate',$cateId	);

		return $productLimit;
	}
		//Thêm Danh Mục
	public static function Add(){
		require_once('../apps/views/admin/add-cate.php');
	}

		//Kiểm tra tên danh mục đã tồn tại hay chưa
	public static function CheckName(){
		if(isset($_POST['cateName'])){
			$cateName = strtolower($_POST['cateName']);
			if(CategoryModel::CheckName($cateName)){
				echo json_encode(['status'=>true]);
			}
			else{
				echo json_encode(['status'=>false]);
			}
		}
	}

	//Lưu Danh Mục
	public static function Save(){
		if(isset($_POST['cateName']) && isset($_POST['cateId'])){
			$cateName = strtolower($_POST['cateName']);
			$cateId = $_POST['cateId'];
			if($cateId==null){
				$save = CategoryModel::Save($cateName,$cateId);
				if($save!=false){
					echo json_encode(['status'=>$save]);
				}
				else{
					echo json_encode(['status'=>false]);
				}
			}
			else{
				if(CategoryModel::Save($cateName,$cateId)){
				echo json_encode(['status'=>$cateId]);
			}
			else{
				echo json_encode(['status'=>false]);
			}
			}
		}
	}

		//Lấy ra 1 Danh Mục
		public static function Id($id){//$act1 : tên danh mục
			//lấy ra thông tin 1 danh mục
			$cate = CategoryModel::GetOne($id);
			//Lấy ra số sản phẩm trên 1 danh mục
			if($cate!=null){
				$productLimit = self::ProductLimit($cate['id']);
				//Trả về số trang sản phẩm
				if($productLimit % 8==0){
					$productPage = $productLimit/8;
				}
				else{
					$productPage = (int)$productLimit/8;
					$productPage++;
				}
				$_SESSION['Cate'] = $cate['name'];
				require_once('../apps/views/admin/one-cate.php');
			}
			
		}
		//Update danh muc 
		public static function Update($cateId){
			//Kiểm tra ID có tồn tại không
			$cate = CategoryModel::CheckId($cateId);
			if($cate!=false){
				require_once('../apps/views/admin/add-cate.php');
			}
			else{
				header("location: ../../");
			}

		}
		//Xóa Danh mục
		public static function Del(){
			//Kiểm tra Id có tồn tại không
			if(isset($_POST['cateId'])){
				$cateId = $_POST['cateId'];
				$cate = CategoryModel::CheckId($cateId);
				if($cate==false){
					echo json_encode(['status'=>false]);
				}
				else{
				//Xóa sản phảm
					if(Call("Product","Del",$cateId)){
					//Xóa danh mục
						if(CategoryModel::Del($cateId)){
							echo json_encode(['status'=>true]);
						}else{
							echo json_encode(['status'=>false]);
						}
					}
					else{
						echo json_encode(['status'=>false]);
					}
				}
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

	//Get name
	public static function GetName($id){
		$name = CategoryModel::GetName($id);
		return $name;
	}
	}
	?>