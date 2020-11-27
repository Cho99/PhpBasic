<?php
class News extends Controller {
    public $NewsModel;
    public function  __construct() {
        //Model
        $this->NewsModel = $this->model("NewsModel");
    }

    public function index() {
        $news = $this->NewsModel->show();
        $this->view("layout", [
            "page" => "home",
            "news" => $news,
         ]);
    }

    public function show($id) {
        $result = $this->NewsModel->getNew($id);
        if($result) {
            $this->view("layout",
                [
                    "page" => "viewNew",
                    "new" => $result,
                ]
            );
        }
    }

    public function addNew() {
        $this->view("layout",["page" => "addNew"]);
    }

    public function store() {
        if(isset($_POST["btn_store"])){
            $title = $_POST["title"];
            $content = $_POST["content"];
            $result =  $this->NewsModel->store($title, $content);
            if($result) {
                $news = $this->NewsModel->show();
                header("location: http://localhost/php/Home");
            }
        }
    }

    public function edit($id) {
        $result = $this->NewsModel->getNew($id);
        if($result) {
            $this->view("layout",
                [
                    "page" => "editNew",
                    "new" => $result,
                ]
            );
        }
    }

    public function editNew() {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $result = $this->NewsModel->update($id, $title, $content);
        if($result) {
            $_SESSION["mess"] = "Sửa thành công";
            header("location: http://localhost/php/Home");
        }else {
            $_SESSION["mess"] = "Sửa thất bại";
            header("location: http://localhost/php/Home");
        }
    }

    public function destroy($id) {
        $result = $this->NewsModel->destroy($id);
        if($result) {
            $_SESSION["mess"] = "Xóa thành công";
            header("location: http://localhost/php/Home");
        }
    }
}
?>