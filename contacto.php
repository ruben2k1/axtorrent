<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - AXTorrent</title>
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
    <?php
        require('app/views/partials/header.php');
    ?>

    <div class="container">
        <?php
            require('app/views/partials/aside-left.php');
        ?>

        <main>
            <div class="main-h2">
                <h2>CONTACTO</h2>
            </div>
            <div class="main-form">
                <form action="app/controllers/processContacto.php" method="post">
                    <label for="nombre"><i class="bi bi-person-vcard"></i></label><br>
                    <input type="text" name="nombre" class="input-text" maxlength="25" required placeholder="Nombre"><br>
                    <label for="correo"><i class="bi bi-envelope"></i></label><br>
                    <input type="email" name="correo" class="input-text" maxlength="50" required placeholder="Correo electrónico"><br>
                    <label for="mensaje"><i class="bi bi-chat-dots"></i></label><br>
                    <textarea name="mensaje" class="input-text" cols="50" rows="10" maxlength="500" required placeholder="Si desea agregar más contenido o algo no está funcionando como debería, no dude en hacérnoslo saber"></textarea><br>
                    <button type="submit"><i class="bi bi-send-check"></i></button>
                </form>
            </div>
        </main>

        <?php
            require('app/views/partials/aside-right.php');
        ?>
    </div>
</body>
</html>