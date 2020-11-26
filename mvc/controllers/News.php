<?php
class News extends Controller {
    public function __construct() {
        
    }

    public function addNew() {
        $this->view("layout",["page" => "addNew"]);
    }

    public function store() {
        echo "<pre>";
        print_r($_POST);
    }
}
?>