<?php
class Home extends Controller {
    function SayHi() {
       $model = $this->model("HomeModel");
   
    }

    function show($x, $y) {
        $model = $this->model("HomeModel");
        $arr = [1,2,3];
        $sum = $model->Sum($x , $y);
        $this->view("login",["data" => $sum, "arr" => $arr]);
    }
}
?>