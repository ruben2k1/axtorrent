<?php
    require_once('app/database/db.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    $sentence1 = $db->prepare("SELECT * FROM files WHERE TYPE='SERIE' LIMIT 9");
    $sentence1->execute();
    $results1 = $sentence1->fetchAll();

    $sentence2 = $db->prepare("SELECT * FROM files WHERE TYPE='PELICULA' LIMIT 9");
    $sentence2->execute();
    $results2 = $sentence2->fetchAll();

    $sentence3 = $db->prepare("SELECT * FROM files WHERE TYPE='VIDEOJUEGO' LIMIT 9");
    $sentence3->execute();
    $results3 = $sentence3->fetchAll();

    $sentence4 = $db->prepare("SELECT * FROM files WHERE TYPE='DOCUMENTAL' LIMIT 9");
    $sentence4->execute();
    $results4 = $sentence4->fetchAll();
?>