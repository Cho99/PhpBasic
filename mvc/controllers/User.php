<?php

class User extends Controller {

    public $UserModel;

    public function __construct() {
        $this->UserModel = $this->model("UserModel");
    }

    public function index() {
        if(isset($_SESSION['user'])) {
            header("location: http://localhost/php/Home");
        }
        $this->view("/pages/login");
    }

    public function postLogin() {
        if(isset($_POST["btnLogin"])) {
            $email = htmlspecialchars($_POST["email"]);
            $password = md5($_POST["password"]);
            $email = trim(htmlspecialchars(($_POST["email"])));
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["login_error"] = "Cần phải là email"; 
                return header("location: http://localhost/php/User");             
            }
            
            $result = $this->UserModel->login($email, $password);

            if($result) {
                //Xet sesssion user
                $_SESSION['user'] = $email;

                if(isset($_POST['remember'])) {  
                    $key = md5($email.$_POST['password']);

                    // set cookie voi khoang thoi gian la` 1 ngay
                    setcookie('key', $key, time() + (86400 * 30), "/"); 
                }else {
                    if(isset($_COOKIE['key'])) {
                        unset($_COOKIE['key']); 
                        setcookie('key', null, -1, '/');
                    }
                }
                header("location: http://localhost/php/Home");
            } else {
                $_SESSION['login_error'] = "Tài khoản hoặc mật khẩu không đúng!";
                header("location: http://localhost/php/User");
            }
        }
    }
    
    public function logout() {
        session_destroy();
        if(isset($_COOKIE['key'])) {
            unset($_COOKIE['key']); 
            setcookie('key', null, -1, '/');
        }
        header("location:http://localhost/php/User/");
    }

    public function register() {
        $this->view("/pages/register");
    }

    public function postRegister() {
       // Lay du lieu tu` form nhap
       if(isset($_POST["btnRegister"])) {
            $username = trim($_POST["username"]);
            $username = htmlspecialchars($username);
            $email = trim(htmlspecialchars(($_POST["email"])));
            $password = trim(str_replace(' ','', $_POST['password']));
            $password = htmlspecialchars($password);
            // Validate Email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_email'] = "Cần phải là email";
                $_SESSION['old_email'] = $email; 
                return header("location: http://localhost/php/User/register");
            }

            $checkEmail = $this->UserModel->checkUser($email);
            if($checkEmail) {
                $_SESSION['error_email'] = "Email đã tồn tại";
                $_SESSION['old_email'] = $email;  
                $_SESSION['old_username'] = $username;    
                return header("location: http://localhost/php/User/register");
            }

            //Validate username
            if (!preg_match("/^[a-zA-Z0-9' ]*$/",$username)) {
                $_SESSION['error_username'] = "Tên không được có ký tự đặc biệt";  
                $_SESSION['old_email'] = $email;  
                $_SESSION['old_username'] = $username;            
                return  header("location: http://localhost/php/User/register");
            }

             //Validate username
            if (trim($username) == '') {
                $_SESSION['error_username'] = "Tên không được để trống";
                return  header("location: http://localhost/php/User/register");
            }

            //Validate username
            if (trim($password) == '') {
                $_SESSION['error_password'] = "Mật khẩu không được để trống";              
                return  header("location: http://localhost/php/User/register");
            }

            if(strlen($password) < 8) {
                $_SESSION['error_password'] = "Mật khẩu ít nhất 8 ký tự";     
                return  header("location: http://localhost/php/User/register");
            }
           // Insert Data 
           $result = $this->UserModel->createUser($username, $password , $email);
    
           // View
           if($result == true) {
               $_SESSION['mess'] = "Đăng ký tài khoản thành công";
           }else {
               $_SESSION['mess'] = "Đăng ký tài khoản thất bại";
           }
           header("location: http://localhost/php/User/login");
       }
    }
}
?>