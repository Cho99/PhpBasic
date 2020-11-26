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
                    echo "Đăng ký thành công";
                } else {
                    echo "Đăng ký thất bại";
                }
            } ?>
        </div> 
        <div class="login">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit" name="btnLogin">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            <a href="http://localhost/php/User/register">Dang Ky</a>
            </label>
        </div>
    </div>
    </form>
</body>
</html>