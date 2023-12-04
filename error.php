<?php
    require_once('app/middlewares/checkError.php');
    require_once('app/controllers/errorController.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - AXTorrent</title>
    <link rel="canonical" href="https://axtorrent.com/contacto">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K9PYVMMV1W"></script>
    <script src="public/js/analytics.js"></script>
</head>
<body>
    <?php require_once('app/views/partials/header.php'); ?>

    <div class="container">
        <?php require_once('app/views/partials/aside-left.php'); ?>

        <main>
            <div class="Wrapper-h1">
                <h1>ERROR</h1>
            </div>
            <div class="error">
                <p>No se ha encontrado ningún resultado para <?php echo $titulo ?></p>
                <p>Escriba únicamente las palabras clave, por ejemplo: Breaking Bad</p>
            </div>
        </main>

        <?php require_once('app/views/partials/aside-right.php'); ?>
    </div>
</body>
</html>