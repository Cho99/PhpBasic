<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://localhost/php/public/css/register.css">
  <title>Sun*|Register</title>
</head>
<body>
  <form action="./postRegister" method="POST">
    <div class="container_register">
      <div class="register">
          <h1 style="text-align:center">Register</h1>
          <hr>
          <?php if(isset($data["result_register"])){
                echo $data["result_register"];
            } ?>
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
          <?php if(isset($_SESSION["error_email"])) {
              echo "<h4>".$_SESSION['error_email']."</h4>";
          } ?>
          <label for="username"><b>UserName</b></label>
          <input type="text" placeholder="UserName" name="username" id="username" required>
          <?php if(isset($_SESSION["error_username"])) {
              echo "<h4>".$_SESSION['error_username']."</h4>";
          } ?>
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="password" required>
          <button type="submit" class="registerbtn" name="btnRegister">Register</button>
        </div>

        <div class="signIn">
          <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div>
      </div>
    </form>
</body>
</html>


