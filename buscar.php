<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar - AXTorrent</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
</head>
<body>
    <?php
        require('app/views/partials/header-logout.php');
    ?>

    <div class="container">
        <?php
            require('app/views/partials/aside.php');
        ?>

        <main>
            <?php require('app/controllers/buscarController.php') ?>
        </main>
    </div>
</body>
</html>