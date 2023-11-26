<?php require_once('app/controllers/novedadesController.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novedades - AXTorrent</title>
    <link rel="canonical" href="https://axtorrent.com/novedades">
    <link rel="stylesheet" href="/public/css/reset.css">
    <link rel="stylesheet" href="/public/css/index.css">
    <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K9PYVMMV1W"></script>
    <script src="/public/js/analytics.js"></script>
</head>
<body>
    <?php require_once('app/views/partials/header.php'); ?>

    <div class="container">
        <?php require_once('app/views/partials/aside-left.php'); ?>

        <main>
            <div class="Wrapper-h1">
                <h1>NOVEDADES</h1>
            </div>
            <div class="main-article">
                <?php
                    foreach ($results1 as $result) {
                        $urlEncoded = urlencode($result['TITLE']);

                        echo "
                        <div class='main-article'>
                            <article>
                                <a href='archivo/{$urlEncoded}'><img src='{$result['EXT_IMG_ROUTE']}' alt='{$result['TITLE']}'></a>
                            </article>
                        </div>";
                    }
                ?>
            </div>
        </main>

        <?php require_once('app/views/partials/aside-right.php'); ?>
    </div>
</body>
</html>