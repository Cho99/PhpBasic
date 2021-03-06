<?php
class News extends Controller {
    public $NewsModel;
    public function  __construct() {
        //Model
        if(!isset($_SESSION['user'])) {
            return header("location: http://localhost/php/User/login");
        }
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
            $title = trim(htmlspecialchars($_POST["title"]));
            $content = trim(htmlspecialchars($_POST["content"]));
            
            if(strlen($title) < 5) {
                $_SESSION['error'] = "Tiêu đề phải có ít nhất 5 ký tự";
                $_SESSION['old_title'] = $title;
                $_SESSION['old_content'] = $content;
                return header("location: http://localhost/php/News/addNew");
            }

            if(strlen($title) > 200) {
                $_SESSION['error'] = "Tiêu đề phải không quá 200 ký tự";
                $_SESSION['old_title'] = $title;
                $_SESSION['old_content'] = $content;
                return header("location: http://localhost/php/News/addNew");
            }

            if(strlen($content) < 10) {
                $_SESSION['error'] = "Nội dung không được ngắn quá";
                $_SESSION['old_title'] = $title;
                $_SESSION['old_content'] = $content;
                return header("location: http://localhost/php/News/addNew");
            }

            $result =  $this->NewsModel->store($title, $content);
            if($result) {
                //$news = $this->NewsModel->show();
                $_SESSION['mess'] = "Thêm bài đăng thành công";
                header("location: http://localhost/php/Home");
            }else {
                $_SESSION['mess_error'] = "Thêm bài đăng thất bại";
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
        $title = trim(htmlspecialchars($_POST['title']));
        $content = trim(htmlspecialchars($_POST['content']));
        if(trim($title) == '') {
            $_SESSION['error'] = "Tiêu đề không được để trống";
            $result = $this->NewsModel->getNew($id);
            if($result) {
                return $this->view("layout",
                    [
                        "page" => "editNew",
                        "new" => $result,
                    ]
                );
            }
        }
        if(strlen($title) < 5 ) {
            $_SESSION['error'] = "Tiêu đề phải có ít nhất 5 ký tự";
            $_SESSION['old_title'] = $title;
            $_SESSION['old_content'] = $content;
            $result = $this->NewsModel->getNew($id);
            if($result) {
                return $this->view("layout",
                    [
                        "page" => "editNew",
                        "new" => $result,
                    ]
                );
            }
        }
        if(trim($content) == '') {
            $_SESSION['error_content'] = "Nội dung không được để trống";
            $result = $this->NewsModel->getNew($id);
            if($result) {
                return $this->view("layout",
                    [
                        "page" => "editNew",
                        "new" => $result,
                    ]
                );
            }
        }

        if(strlen($content) < 10) {
            $_SESSION['error_content'] = "Nội dung không được ngắn quá";
            $_SESSION['old_title'] = $title;
            $_SESSION['old_content'] = $content;
            $result = $this->NewsModel->getNew($id);
            if($result) {
                return $this->view("layout",
                    [
                        "page" => "editNew",
                        "new" => $result,
                    ]
                );
            }
        }
       
        $result = $this->NewsModel->update($id, $title, $content);
        if($result) {
            $_SESSION["mess"] = "Sửa bài đăng thành công";
        }else {
            $_SESSION["mess"] = "Sửa bài đăng thất bại";
        }
        header("location: http://localhost/php/Home");
    }

    public function destroy($id) {
        $result = $this->NewsModel->destroy($id);
        if($result) {
            $_SESSION["mess"] = "Xóa bài đăng thành công";
          
        } else {
            $_SESSION["mess"] = "Xóa bài đăng thất bại";
        }
        header("location: http://localhost/php/Home");
    }
}
?>