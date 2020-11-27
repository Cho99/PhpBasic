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
          <h1>Register</h1>
          <hr>
          <?php if(isset($data["result_register"])){
                echo $data["result_register"];
            } ?>
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>

          <label for="username"><b>UserName</b></label>
          <input type="text" placeholder="UserName" name="username" id="username" required>


          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="password" required>

        
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
          <button type="submit" class="registerbtn" name="btnRegister">Register</button>
        </div>

        <div class="container signin">
          <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div>
      </div>
    </form>
</body>
</html>


