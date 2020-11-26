<?php
class Home extends Controller {   
    public function  __construct() {
        //Model
    }
    public function index() {
       $this->view("layout", [
           "page" => "home"
        ]);
    }
}
?>