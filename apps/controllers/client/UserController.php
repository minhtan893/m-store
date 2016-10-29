<?php 
	//Class Xử lý phần client User
class UserController{

	//Hàm Login//////////////////////////////////////////////////////////////////////////////
	public static function Login(){
		$login_error = null;
		if($_SERVER['REQUEST_METHOD'] == "GET"){
			require_once('apps/views/client/user/login.php');
		}
		else{//Gọi hàm kiểm tra form login / nếu sai trả lại form login với biến session $error
			$email = $_POST['email'];
			$tmp = $_POST['pass'];
			$user = new UserModel(null,null,$email,null,null);
			$newUser = $user::CheckUser($user);//lấy ra email nếu tồn tại
			if($newUser){
				if(password_verify($tmp ,$newUser->password)){	
					unset($_SESSION['login_error']);//Xóa biến login_error;
					$_SESSION['userId'] = $newUser->id;
					$_SESSION['userName'] = $newUser->username;
					
					if($newUser->level=='1'){//Chuyển sang trang admin
						header('location: http://localhost/m-store/admin');
					}
					else{
						header('location: http://localhost/m-store/');
					}
				}
				else{
					$_SESSION['login_error'] ='error';
					header('location: http://localhost/m-store/User/Login');
				}
			}
			else{
				$_SESSION['login_error'] ='error';
				header('location: http://localhost/m-store/User/Login');
			}
		}
	}

	//Kiểm tra login để mua hàng
	public static function CartLogin($productId){
		$login_error = null;
		if($_SERVER['REQUEST_METHOD'] == "GET"){
			require_once('apps/views/client/cart-login.php');
		}
		else{//Gọi hàm kiểm tra form login / nếu sai trả lại form login với biến session $error
			$email = $_POST['email'];
			$tmp = $_POST['pass'];
			$user = new UserModel(null,null,$email,null,null);
			$newUser = $user::CheckUser($user);//lấy ra email nếu tồn tại
			if($newUser){
				if(password_verify($tmp ,$newUser->password)){	
					unset($_SESSION['login_error']);//Xóa biến login_error;
					$_SESSION['userId'] = $newUser->id;
					$_SESSION['userName'] = $newUser->username;
					return true;
				}
				else{
					$_SESSION['login_error'] ='error';
					header('location: http://localhost/m-store/User/CartLogin/'.$productId);
				}
			}
			else{
				$_SESSION['login_error'] ='error';
				header('location: http://localhost/m-store/User/CartLogin/'.$productId);
			}
		}
	}
	//Hàm Register///////////////////////////////////////////////////////////
	public static function Register(){
		if($_SERVER['REQUEST_METHOD'] == "GET"){
			require_once('apps/views/client/user/register.php');
		}
	}

	//Hàm kiểm tra Xem Email đã tồn tại hay chưa
	public static function EmailExist(){
		if(isset($_POST['email'])){
			$email = $_POST['email'];
			$userTmp = new UserModel(null,null,$email,null,null);//Khởi tạo đối tượng Usermodel để kiểm tra email
			$check = $userTmp->EmailExits($userTmp);//Kiểm tra email;
			if($check){
				echo json_encode(['status'=>true]);
				return true;
			}
			else{
				echo json_encode(['status'=>false]);
				return false;
			}
		}
	}
	//Lưu User
	public static function AddNew(){
		if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
			$user = new UserModel(null,$username,$email,$password);
			$newUser = $user->Save($user);
			if($newUser!=false){
				echo json_encode(['status'=>true]);
			}
			else{
				echo json_encode(['status'=>false]);
			}
		}
	}
	
	//Sign Out////////////////////////////////////////////////////////
	public static function SignOut(){
		session_destroy();
		header('location: http://localhost/m-store/');
	}

	//TRang cá nhân
	public static function Id($id){
		//Kiểm tra id có tồn tại không
		if(isset($_SESSION['userId'])){
			$userId = $_SESSION['userId'];
			//Lấy dữ liệu các đơn hàng đã đặt
			$page = CartController::Page($userId);
			$cart = new CartModel(null,null,null,null,null,null,null,null,$userId);
		
			//Cập nhật đơn hàng
		require_once('./apps/views/client/user.php');
	}
			else{
		header('location: http://localhost/m-store/');
		}
	}	
}
?>