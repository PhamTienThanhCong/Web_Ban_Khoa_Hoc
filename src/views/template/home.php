<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        phần đầu trang
    </header>
    <div class="container">
        <?php require_once "./src/views/content/". $view .".php" ?>
    </div>
    <footer>
        Phần chân trang
    </footer>
</body>
</html>