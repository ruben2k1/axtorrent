<?php
    require('app/database/db.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header('Location: index.php');
        die();
    }

    $id = $_GET['id'];

    $sentence1 = $db->prepare("SELECT * FROM files WHERE ID = ?");
    $sentence1->bindParam(1, $id);
    $sentence1->execute();
    $results1 = $sentence1->fetch();

    if ($results1 === false) {
        header('Location: index.php');
        die();
    }

    $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM episodes WHERE FILE_ID = ?");
    $sentence2->bindParam(1, $id);
    $sentence2->execute();
    $results2 = $sentence2->fetch();

    $sentence3 = $db->prepare("SELECT * FROM episodes WHERE FILE_ID = ?");
    $sentence3->bindParam(1, $id);
    $sentence3->execute();
    $results3 = $sentence3->fetchAll();
?>