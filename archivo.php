<?php
    require_once('app/controllers/archivoController.php');
    $encodedTitle = urlencode($results1['TITLE']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar <?php echo $results1['TITLE']; ?> - AXTorrent</title>
    <meta name="description" content="Descargar <?php echo $results1['TITLE']; ?>">
    <link rel="canonical" href="https://axtorrent.com/archivo/<?php echo $encodedTitle; ?>">
    <meta property="og:locale" content="es_ES">
    <meta property="og:url" content="https://axtorrent.com">
    <meta property="og:site_name" content="AXTorrent - Descargar Películas y Series Torrent Gratis">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Descargar <?php echo $results1['TITLE']; ?> Gratis en Español y <?php echo $results1['FORMAT']; ?>">
    <meta name="twitter:description" content="Descargar <?php echo $results1['TITLE']; ?> Gratis en Español y <?php echo $results1['FORMAT']; ?>">
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
                <h1>DESCARGAR: <?php echo $results1['TITLE']; ?> por Torrent</h1>
            </div>
            <div class="main-article">
                <article>
                    <img src="<?php echo $results1['EXT_IMG_ROUTE'] ?>" alt="<?php echo $results1['TITLE'] ?>">
                </article>
                <article>
                    <ul>
                        <?php
                            if ($results1['TYPE'] === 'SERIE') {
                                echo "
                                <li>Episodios: {$results2['COUNT']}</li>
                                <li>Formato: {$results1['FORMAT']}</li>
                                <li>Descripción: {$results1['DESCRIPTION']}</li>";
                            }elseif ($results1['TYPE'] === 'PELICULA') {
                                if (!empty($results1['RELEASE_DATE'])) {
                                    echo "
                                    <li>Año: {$results1['RELEASE_DATE']}</li>
                                    <li>Género: {$results1['GENRE']}</li>
                                    <li>Director: {$results1['DIRECTOR']}</li>
                                    <li>Reparto: {$results1['CAST']}</li>
                                    <li>Formato: {$results1['FORMAT']}</li>
                                    <li>Descripción: {$results1['DESCRIPTION']}</li>";
                                } else {
                                    echo "
                                    <li>Género: {$results1['GENRE']}</li>
                                    <li>Director: {$results1['DIRECTOR']}</li>
                                    <li>Reparto: {$results1['CAST']}</li>
                                    <li>Formato: {$results1['FORMAT']}</li>
                                    <li>Descripción: {$results1['DESCRIPTION']}</li>";
                                }
                            }elseif ($results1['TYPE'] === 'MUSICA') {
                                if (!empty($results1['RELEASE_DATE'])) {
                                    echo "
                                    <li>Año: {$results1['RELEASE_DATE']}</li>
                                    <li>Género: {$results1['GENRE']}</li>";
                                }else {
                                    echo "<li>Género: {$results1['GENRE']}</li>";
                                }
                                
                            }elseif ($results1['TYPE'] === 'VIDEOJUEGO') {
                                if (empty($results1['FORMAT'])) {
                                    echo "
                                    <li>Formato: {$results1['GENRE']}</li>";
                                } else{
                                    echo "
                                    <li>Formato: {$results1['FORMAT']}</li>";
                                }

                                if (!empty($results1['DESCRIPTION'])) {
                                    echo "<li>Descripción: {$results1['DESCRIPTION']}</li>";
                                }
                            }elseif ($results1['TYPE'] === 'DOCUMENTAL') {
                                echo "
                                <li>Formato: {$results1['FORMAT']}</li>
                                <li>Descripción: {$results1['DESCRIPTION']}</li>";
                            }
                        ?>
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
                                $formattedDate = date('d-m-Y', strtotime($result['UPLOAD_DATE']));                                
                                
                                echo "
                                <tr>
                                    <td>{$result['EPISODE']}</td>
                                    <td><a href='" . $result['OUO_FILE_ROUTE'] . "' rel='nofollow' target='_blank' download>DESCARGAR</a></td>
                                    <td>{$formattedDate}</td>
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