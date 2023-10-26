<?php
    require('app/database/db.php');

    $type = $_GET['type'];

    if (!isset($_GET['type']) || $type==='') {
        header('Location: index.php');
        die();
    }

    $page = $_GET['page'] ?? 1;
    $offset = ($page - 1) * 20;

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    $sentence1 = $db->prepare("SELECT * FROM FILES WHERE UPPER(TYPE) LIKE UPPER(?) LIMIT 20 OFFSET ?");
    $titulo = "%$type%";
    $sentence1->bindParam(1, $type);
    $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
    $sentence1->execute();
    $results1 = $sentence1->fetchAll();

    //Implementar ifs según el query param
?>