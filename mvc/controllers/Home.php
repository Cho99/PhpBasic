<?php
class Home extends Controller {   
    public $NewsModel;
    public function  __construct() {
        //Model
        $this->NewsModel = $this->model("NewsModel");
    }
    public function index() {
       $this->view("layout", [
           "page" => "home"
        ]);
    }
}
?>