<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php/public/css/header.css">
    <title>Sun*</title>
</head>
<body>
    <?php require_once "./mvc/views/blocks/header.php" ?>
    <div class="container_main">
        
        <?php 
        if(!$_SESSION['user']) {
            header('location:http://localhost/php/User/login');
        }
        require"./mvc/views/pages/".$data["page"].".php" 
        ?>
    </div>
</body>
</html>