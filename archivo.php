<?php require('app/controllers/archivoController.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar <?php echo $results1['TITLE']; ?> - AXTorrent</title>
    <meta name="description" content="Descargar <?php echo $results1['TITLE']; ?>">
    <meta property="og:locale" content="es_ES">
    <meta property="og:url" content="https://axtorrent.com">
    <meta property="og:site_name" content="AXTorrent - Descargar Películas y Series Torrent Gratis">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Descargar <?php echo $results1['TITLE']; ?> Gratis en Español y <?php echo $results1['FORMAT']; ?>">
    <meta name="twitter:description" content="Descargar <?php echo $results1['TITLE']; ?> Gratis en Español y <?php echo $results1['FORMAT']; ?>">
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
            <div class="main-h1">
                <h1>DESCARGAR: <?php echo $results1['TITLE']; ?> por Torrent</h1>
            </div>
            <div class="main-article">
                <article>
                    <img src="<?php echo $results1['EXT_IMG_ROUTE'] ?>" alt="<?php echo $results1['TITLE'] ?>">
                </article>
                <article>
                    <ul>
                        <li>FORMATO: <?php echo $results1['FORMAT'] ?></li>
                        <li>EPISODIOS: <?php echo $results2['COUNT'] ?></li>
                        <li>DESCRIPCIÓN: <?php echo $results1['DESCRIPTION'] ?></li>
                    </ul>
                    <table>
                        <thead>
                          <tr>
                            <th>EPISODIOS</th>
                            <th>ENLACE</th>
                            <th>FECHA</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($results3 as $result) {
                                echo "
                                <tr>
                                    <td>{$result['EPISODE']}</td>
                                    <td><a href='" . (isset($result['INT_FILE_ROUTE']) ? $result['INT_FILE_ROUTE'] : $result['EXT_FILE_ROUTE']) . "' download>DESCARGAR</a></td>
                                    <td>{$result['DATE']}</td>
                                </tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </article>
            </div>
        </main>

        <?php require('app/views/partials/aside-right.php'); ?>
    </div>
</body>
</html>