<?php require('app/controllers/buscarController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar <?php echo $type ?? $title ?> - AXTorrent</title>
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
                <h2>BUSCAR: <?php echo $type ?? $title ?></h2>
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
            <ul>
            <?php 
                for ($i = $minPage; $i <= $maxPage; $i++) {
                    $param = isset($type) ? "type={$type}" : "title={$title}";
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