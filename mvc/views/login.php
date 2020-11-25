<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/login.css">
    <title>Document</title>
</head>
<body>
<form action="action_page.php" method="post">
    <div class="container">
        <div class="imgcontainer">
            <h3>WellCome</h3>
            <?php 
                while($row = mysqli_fetch_array($data["news"])){
                    print_r ($row["title"]);
                }
            ?>
        </div> 
        <div class="login">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
    </div>
    </form>
</body>
</html>