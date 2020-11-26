<?php
class Home extends Controller {
    public $NewModel;
    
    public function  __construct() {
        //Model
        $this->NewModel = $this->model("NewModel");
    }
    function index() {
       $this->view("layout", [
           "page" => "home"
        ]);
    }
}
?>