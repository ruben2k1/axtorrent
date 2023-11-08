<?php
    require_once('../../database/db.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    function getNextIdFiles($db) {
        $sentence1 = $db->prepare("SELECT MAX(ID) AS MAX FROM files");
        $sentence1->execute();
        $results1 = $sentence1->fetch();
    
        return $results1['MAX'] + 1;
    }
?>