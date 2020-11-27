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
                $this->view("layout", 
                [
                    "page" => "home",
                    "result" => $result,
                    "news" => $news,
                ]
            );
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
            $news = $this->NewsModel->show();
            $this->view("layout", 
            [
                "page" => "home",
                "result_update" => $result,
                "news" => $news,
            ]
            );
        }
    }

    public function destroy($id) {
        $result = $this->NewsModel->destroy($id);
        if($result) {
            $news = $this->NewsModel->show();
            $this->view("layout", 
            [
                "page" => "home",
                "result_delete" => $result,
                "news" => $news,
            ]
            );
        }
    }
}
?>