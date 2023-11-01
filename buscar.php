<?php require('app/controllers/buscarController.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar: <?php echo $type ?? $title ?? $format ?> - AXTorrent</title>
    <meta name="description" content="Buscar: <?php echo $type ?? $title ?? $format ?> - AXTorrent">
    <meta property="og:locale" content="es_ES">
    <meta property="og:url" content="https://axtorrent.com">
    <meta property="og:site_name" content="AXTorrent - Descargar Películas y Series Torrent Gratis">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Buscar: <?php echo $type ?? $title ?? $format ?> - AXTorrent">
    <meta name="twitter:description" content="Buscar: <?php echo $type ?? $title ?? $format ?> - AXTorrent">
    <meta name="twitter:image" content="public/logo.svg">
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
    <?php require('app/views/partials/header.php'); ?>

    <div class="banner-1">
        <?php require('app/views/partials/ad.php'); ?>
    </div>

    <div class="container">
        <?php require('app/views/partials/aside-left.php'); ?>

        <main>
            <div class="main-h2">
                <h2>BUSCAR: <?php echo $type ?? $title ?? $format ?></h2>
            </div>
            <div class="Wrapper-article">
                <?php
                    foreach ($results1 as $result) {
                        $urlEncoded = urlencode($result['TITLE']);

                        echo "
                        <article>
                            <ul>
                                <li><a href='archivo.php?title={$urlEncoded}'>{$result['TITLE']}</a></li>
                            </ul>
                        </article>";
                    }
                ?>
            </div>
            <ul class="pagination">
                <?php 
                    for ($i = $minPage; $i <= $maxPage; $i++) {
                        if (isset($type)) {
                            $param = "type={$type}";
                        } elseif (isset($title)) {
                            $param = "title={$title}";
                        } elseif (isset($format)) {
                            $param = "format={$format}";
                        } else {
                            $param = "";
                        }

                        echo "<li><a href='buscar.php?$param&page=$i'>$i</a></li>";
                    }
                ?>
            </ul>
        </main>

        <?php
            require('app/views/partials/aside-right.php');
        ?>
    </div>
</body>
</html>