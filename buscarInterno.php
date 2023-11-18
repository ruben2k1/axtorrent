<?php require_once('app/middlewares/checkSession.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador dinámico</title>
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
</head>
<body>
    <form>
        <label for="titulo">Buscar por título:</label>
        <input type="text" id="titulo" name="titulo" oninput="buscar()">
    </form>

    <div id="resultados"></div>

    <script>
        function buscar() {
            var titulo = document.getElementById("titulo").value;

            fetch('app/controllers/buscarInternoController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'titulo=' + encodeURIComponent(titulo),
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById("resultados").innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>