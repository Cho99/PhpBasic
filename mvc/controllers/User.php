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
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $result = $this->UserModel->login($email, $password);
            if($result) {
                $_SESSION['user'] = $email;
                if(isset($_POST['remember'])) {  
                    $key = md5($email.$password);
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
        header("location: http://localhost/php/User");
    }

    public function register() {
        $this->view("/pages/register");
    }

    public function postRegister() {
       // Lay du lieu tu` form nhap
       if(isset($_POST["btnRegister"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = trim($_POST["password"]);

            // Validate Email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_email'] = "Cần phải là email";              
                return header("location: http://localhost/php/User/register");
            }

            $checkEmail = $this->UserModel->checkUser($email);
            if($checkEmail) {
                $_SESSION['error_email'] = "Email đã tồn tại";     
                return header("location: http://localhost/php/User/register");
            }

            // Validate username
            // if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
            //     $_SESSION['error_username'] = "Tên không được có ký tự đặc biệt";              
            //     return  header("location: http://localhost/php/User/register");
            // }

            // Validate password
            if((preg_match("/^[a-zA-Z-' ]*$/", $password))) {
                $_SESSION['error_password'] = "Password không được chứa khoảng trắng và ký tự đặc biệt";     
                return header("location: http://localhost/php/User/register");
            }
            if(strlen($password) <= 8 && strlen($password) >= 5) {
                $_SESSION['error_password'] = "Password phải trong khoảng 5 đến 8 ký tự";     
                return  header("location: http://localhost/php/User/register");
            }

           // Insert Data 
           $result = $this->UserModel->createUser($username, md5($password), $email);
           // View
           header("location: http://localhost/php/User/login");
       }
    }
}
?>