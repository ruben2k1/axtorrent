<?php
    require_once('../database/db.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    $titulo = $_POST['titulo'];

    $stmt = $db->prepare("SELECT DISTINCT files.TITLE, episodes.FILE_ID FROM episodes INNER JOIN files ON episodes.FILE_ID = files.ID WHERE files.TITLE LIKE ? LIMIT 25");
    $titulo = "%$titulo%";
    $stmt->bindParam(1, $titulo);
    $stmt->execute();

    $result = $stmt->fetchAll();

    if ($result) {
        foreach ($result as $row) {
            echo "
            <ul>
                <li>TITULO: {$row['TITLE']}</li>
                <li>FILE_ID: {$row["FILE_ID"]}</li>
            </ul>";
        }
    } else {
        echo "No se encontraron resultados para el título '$titulo'";
    }
?>