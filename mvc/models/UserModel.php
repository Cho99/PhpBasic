<?php
class UserModel extends DB {
    public function createUser($username, $password, $email){
        $qr = "INSERT INTO users Values(null, '$username' , '$password' , '$email')";
        $result = false;
        if( mysqli_query($this->con, $qr) ) {
            $result = true;
        }
        return json_encode($result);
    }

    public function login($email, $password) {
        $qr = "SELECT * FROM users WHERE email = '$email' AND `password` = '$password'";
        $result = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_row($result);
        if($row > 0) {
            return true;  
        } 
        return false;
    }
} 
?>