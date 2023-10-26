<?php
    require('app/database/db.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    $sentence1 = $db->prepare("SELECT * FROM FILES WHERE ID >= (SELECT MAX(ID) FROM FILES) - 19");
    $sentence1->execute();
    $results1 = $sentence1->fetchAll();
?>