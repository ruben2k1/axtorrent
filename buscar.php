<?php
    require_once('app/controllers/buscarController.php');
    require_once('app/controllers/functions/cleanQueryParams.php');
    $paginaParam = isset($pagina) && $pagina != 1 ? "&pagina=$pagina" : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar: <?php echo $tipo ?? $titulo ?? $formato ?> - AXTorrent</title>
    <meta name="description" content="Buscar: <?php echo $tipo ?? $titulo ?? $formato ?> - AXTorrent">
    <link rel="canonical" href="https://axtorrent.com/buscar/<?php echo $param . "/" . urlencode($tipo ?? $titulo ?? $formato) . $paginaParam ?>">
    <meta property="og:locale" content="es_ES">
    <meta property="og:url" content="https://axtorrent.com">
    <meta property="og:site_name" content="AXTorrent - Descargar Películas y Series Torrent Gratis">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Buscar: <?php echo $tipo ?? $titulo ?? $formato ?> - AXTorrent">
    <meta name="twitter:description" content="Buscar: <?php echo $tipo ?? $titulo ?? $formato ?> - AXTorrent">
    <meta name="twitter:image" content="/public/logo.svg">
    <link rel="stylesheet" href="/public/css/reset.css">
    <link rel="stylesheet" href="/public/css/index.css">
    <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K9PYVMMV1W"></script>
    <script src="/public/js/analytics.js"></script>
</head>
<body>
    <?php require('app/views/partials/header.php'); ?>

    <div class="container">
        <?php require('app/views/partials/aside-left.php'); ?>

        <main>
            <div class="Wrapper-h1">
                <h1>BUSCAR: <?php echo $tipo ?? $titulo ?? $formato ?></h1>
            </div>
            <div class="Wrapper-article">
                <?php
                    foreach ($results1 as $result) {
                        $urlEncoded = urlencode($result['TITLE']);

                        echo "
                        <article>
                            <ul>
                                <li><a href='/archivo/{$urlEncoded}'>{$result['TITLE']}</a></li>
                            </ul>
                        </article>";
                    }
                ?>

                <ul class="pagination">
                <?php 
                    for ($i = $minPage; $i <= $maxPage; $i++) {
                        if (isset($tipo)) {
                        $param = "tipo/{$tipo}";
                        } elseif (isset($titulo)) {
                        $param = "titulo/{$titulo}";
                        } elseif (isset($formato)) {
                        $param = "formato/{$formato}";
                        } else {
                        $param = "";
                        }

                        echo "<li><a href='/buscar/$param/pagina/$i'>$i</a></li>";
                    }
                ?>
                </ul>
            </div>

        </main>

        <?php require('app/views/partials/aside-right.php'); ?>
    </div>
</body>
</html>