<?php require('app/controllers/novedadesController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novedades - AXTorrent</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
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
                <h2>NOVEDADES</h2>
            </div>
            <div class="main-article">
                <?php
                    foreach ($results1 as $result) {
                        echo "
                        <div class='main-article'>
                            <article>
                                <a href=''><img src='{$result['EXT_IMG_ROUTE']}' alt='{$result['TITLE']}'></a>
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