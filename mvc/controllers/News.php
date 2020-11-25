<?php
class News extends Controller {
    function show() {
       $model = $this->model("NewModel"); 
       $data = $model->GetNew();
       $this->view("login", ["news" => $data]);

    }
}
?>