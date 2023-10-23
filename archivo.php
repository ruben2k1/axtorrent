<?php
    require('app/database/db.php');

    $id = $_GET['id'];

    $db = new Connection('localhost', 'filedown', 3306, 'root', '');

    $sentence1 = $db->prepare("SELECT * FROM ARCHIVOS WHERE ID = ?");
    $sentence1->bindParam(1, $id);
    $sentence1->execute();
    $results1 = $sentence1->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $results1['TITULO'] ?> - AXTorrent</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
</head>
<body>
    <?php
        require('app/views/partials/header-logout.php');
    ?>

    <div class="container">
        <?php
            require('app/views/partials/aside.php');
        ?>

        <main>
            <h2>📂 <?php echo $results1['TITULO'] ?></h2>
            
            <?php
                echo "
                <article>
                    <ul>
                        <li><img src='{$results1['RUTA_IMG']}' alt=''></li>
                        <li>{$results1['TITULO']}</li>
                        <button><a href='{$results1['RUTA_ARCHIVO']}' download>DESCARGAR</a></button>
                    </ul>
                </article>
                ";
            ?>
        </main>
    </div>
</body>
</html>