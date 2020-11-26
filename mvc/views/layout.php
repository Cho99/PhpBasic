<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sun*</title>
</head>
<body>
    <?php require_once "./mvc/views/blocks/header.php" ?>
    <div class="container_main">
        <?php require_once "./mvc/views/pages/".$data["page"].".php" ?>
    </div>
</body>
</html>