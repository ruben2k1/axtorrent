<?php require('app/controllers/archivoController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos - AXTorrent</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
</head>
<body>
    <?php require('app/views/partials/header.php'); ?>

    <div class="container">
        <?php require('app/views/partials/aside-left.php'); ?>

        <main>
            <div class="main-h2">
                <h2>ARCHIVO</h2>
            </div>
            <div class="main-article">
                <article>
                    <img src="<?php echo $results1['EXT_IMG_ROUTE'] ?>" alt="">
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
                                        <td><a href='{$result['EXT_FILE_ROUTE']}' download>DESCARGAR</a></td>
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