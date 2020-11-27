<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php/public/css/login.css">
    <title>Sun*</title>
</head>
<body>
<form action="http://localhost/php/User/postLogin" method="POST">
    <div class="container">
        <div class="imgcontainer">
            <h3>WellCome</h3>
            <?php if(isset($data["result"])){
                if($data["result"] == "true") {
                    echo "<h3>Đăng ký thành công<h3/>";
                } 
            } ?>
            <?php if(isset($_SESSION['login_error'])){
                echo "<h4 style='color: red'>".$_SESSION['login_error']."<h4/>";
            } ?>
            <?php 
                $email = '';
                $password = '';
                $check = false;
                if(isset($_COOKIE['key'])) {
                    $key = explode("_",$_COOKIE['key']);
                    $email= $key[0];
                    $password = $key[1];
                    $check = true;
                }
            ?>
        </div> 
        <div class="login">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" value="<?php echo $email ?>" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="<?php echo $password ?>" required>

            <button type="submit" name="btnLogin">Login</button>
            <label>
            <input <?php echo $check?"checked":"" ?> type="checkbox" name="remember" value="1"> Remember me
            <a href="http://localhost/php/User/register">Đăng Ký</a>
            </label>
        </div>
    </div>
    </form>
</body>
</html>