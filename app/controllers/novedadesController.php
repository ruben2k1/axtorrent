<?php
    require_once('app/database/db.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    $sentence1 = $db->prepare("SELECT * FROM files WHERE ID >= (SELECT MAX(ID) FROM files) - 19");
    $sentence1->execute();
    $results1 = $sentence1->fetchAll();
?>