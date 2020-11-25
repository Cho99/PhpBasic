<?php
 class DB {
    public $con;
    protected $servername ="localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "news";

    function __construct() {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        if($this->con) {
            echo "Ket Noi Thanh Cong";
        }
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con,"SET NAMES 'utf8'");
    }
 }   
?>