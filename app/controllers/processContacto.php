<?php
    require('../database/db.php');

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $db = new Connection('localhost', 'filedown', 3306, 'root', '');

    $sentence1 = $db->prepare("INSERT INTO CONTACTO (nombre, correo, mensaje) VALUES (?, ?, ?)");
    $sentence1->bindParam(1, $nombre);
    $sentence1->bindParam(2, $correo);
    $sentence1->bindParam(3, $mensaje);
    $sentence1->execute();

    header('Location: ../../contacto.php');
?>