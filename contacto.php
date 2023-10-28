<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - AXTorrent</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K9PYVMMV1W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-K9PYVMMV1W');
    </script>
</head>
<body>
    <?php
        require('app/views/partials/header.php');
    ?>

    <div class="container">
        <?php
            require('app/views/partials/aside-left.php');
        ?>

        <main>
            <div class="main-h2">
                <h2>CONTACTO</h2>
            </div>
            <div class="main-article">

            </div>
        </main>

        <?php
            require('app/views/partials/aside-right.php');
        ?>
    </div>
</body>
</html>