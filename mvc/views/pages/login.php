<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php/public/css/login.css">
    <title>Document</title>
</head>
<body>
<form action="action_page.php" method="post">
    <div class="container">
        <div class="imgcontainer">
            <h3>WellCome</h3>
        </div> 
        <div class="login">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            <a href="http://localhost/php/User/register">Dang Ky</a>
            </label>
        </div>
    </div>
    </form>
</body>
</html>