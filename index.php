<?php require('app/controllers/indexController.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXTorrent - Descargar Películas y Series Gratis en Español</title>
    <meta name="description" content="AXTorrent - Descargar y Ver Estrenos de Series y Pelis Torrent Gratis en Español. 4K, HD, VOSE y gran variedad de géneros sin publicidad">
    <meta property="og:locale" content="es_ES">
    <meta property="og:url" content="https://axtorrent.com">
    <meta property="og:site_name" content="AXTorrent - Descargar Películas y Series Torrent Gratis">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="AXTorrent - Descargar Películas y Series Gratis en Español">
    <meta name="twitter:description" content="AXTorrent - Descargar y Ver Estrenos de Series y Pelis Torrent Gratis en Español. 4K, HD, VOSE y gran variedad de géneros sin publicidad">
    <meta name="twitter:image" content="public/logo.svg">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php require('app/views/partials/cmp.php'); ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K9PYVMMV1W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-K9PYVMMV1W');
    </script>
</head>
<body>
    <?php require('app/views/partials/header.php'); ?>

    <div class="container">
        <?php require('app/views/partials/aside-left.php'); ?>

        <main>
            <div class="main-h2">
                <h2>ÚLTIMOS TORRENTS</h2>
            </div>
            <h3>SERIES</h3>
            <div class="main-article">
                <?php
                    foreach ($results1 as $result) {
                        echo "
                        <div class='main-article'>
                            <article>
                                <a href='archivo.php?id={$result['ID']}'><img src='{$result['EXT_IMG_ROUTE']}' alt='{$result['TITLE']}'></a>
                            </article>
                        </div>";
                    }
                ?>
            </div>
            <h3>PELÍCULAS</h3>
            <div class="main-article">
                <?php
                    foreach ($results2 as $result) {
                        echo "
                        <div class='main-article'>
                            <article>
                                <a href='archivo.php?id={$result['ID']}'><img src='{$result['EXT_IMG_ROUTE']}' alt='{$result['TITLE']}'></a>
                            </article>
                        </div>";
                    }
                ?>
            </div>
            <h3>VIDEOJUEGOS</h3>
            <div class="main-article">
                <?php
                    foreach ($results3 as $result) {
                        echo "
                        <div class='main-article'>
                            <article>
                                <a href='archivo.php?id={$result['ID']}'><img src='{$result['EXT_IMG_ROUTE']}' alt='{$result['TITLE']}'></a>
                            </article>
                        </div>";
                    }
                ?>
            </div>
            <h3>DOCUMENTALES</h3>
            <div class="main-article">
                <?php
                    foreach ($results4 as $result) {
                        echo "
                        <div class='main-article'>
                            <article>
                                <a href='archivo.php?id={$result['ID']}'><img src='{$result['EXT_IMG_ROUTE']}' alt='{$result['TITLE']}'></a>
                            </article>
                        </div>";
                    }
                ?>
            </div>
        </main>

        <?php
            require('app/views/partials/aside-right.php');
        ?>
    </div>
</body>
</html>