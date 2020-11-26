<?php
class User extends Controller {
    public function index() {
        $this->view("/pages/login");
    }

    public function register() {
        $this->view("layout", 
        ["page" => "register"]
        );
    }

    public function postRegister() {
        
    }
}
?>