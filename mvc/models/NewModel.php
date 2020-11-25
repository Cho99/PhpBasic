<?php
class NewModel extends DB {
    public function GetNew() {
        $qr = "SELECT * FROM news";
        return mysqli_query($this->con, $qr);
    }
}
?>