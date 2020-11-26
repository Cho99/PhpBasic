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
            $password = $_POST["password"];
            $result = $this->UserModel->login($email, $password);
            if($result) {
                $_SESSION['user'] = $email;
                header("location: http://localhost/php/Home");
            } else {
                header("location: http://localhost/php/User");
            }
        }
    }

    public function logout() {
        session_destroy();
        header("location: http://localhost/php/User");
    }

    public function register() {
        $this->view("layout", 
        ["page" => "register"]
        );
    }

    public function postRegister() {
       // Lay du lieu tu` form nhap
       if(isset($_POST["btnRegister"])) {
           $username = $_POST["username"];
           $email = $_POST["email"];
           $password = $_POST["password"];

           // Insert Data 
           $result = $this->UserModel->createUser($username, $password, $email);
           
           // View
           $this->view("/pages/login", [
               "result" => $result
            ]);
       }
    }
}
?>