<?php
class Home extends Controller {   
    public $NewsModel;
    public $UserModel;
    public function  __construct() {
        //Model
        $this->NewsModel = $this->model("NewsModel");
        $this->UserModel = $this->model("UserModel");
    }
    public function index() {
       $news = $this->NewsModel->show();
       $users = $this->UserModel->show();
       $this->view("layout", [
           "page" => "home",
           "users" => $users,
           "news" => $news,
        ]);
    }
}
?>