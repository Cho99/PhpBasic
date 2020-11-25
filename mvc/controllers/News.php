<?php
class News extends Controller {
    function SayHi() {
       $model = $this->model("NewModel"); 
       echo $model->Show();
    }
}
?>