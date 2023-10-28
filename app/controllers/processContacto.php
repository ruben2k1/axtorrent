<?php
    require('../database/db.php');
    
    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');
    
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    if ($nombre === '' || $correo === '' || $mensaje === '') {
        header('Location: ../../index.php');
        die();
    }

    $sentence1 = $db->prepare("INSERT INTO CONTACT (name, email, message) VALUES (?, ?, ?)");
    $sentence1->bindParam(1, $nombre);
    $sentence1->bindParam(2, $correo);
    $sentence1->bindParam(3, $mensaje);
    $sentence1->execute();

    header('Location: ../../index.php');
?>