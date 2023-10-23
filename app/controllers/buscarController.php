<?php
    require('app/database/db.php');

    $titulo = $_GET['titulo'];

    if ($titulo==='') {
        header('Location: index.php');
    }

    $db = new Connection('localhost', 'filedown', 3306, 'root', '');

    $sentence1 = $db->prepare("SELECT * FROM ARCHIVOS WHERE LOWER(TITULO) LIKE LOWER(?)");
    $titulo = "%$titulo%";
    $sentence1->bindParam(1, $titulo);
    $sentence1->execute();
    $results1 = $sentence1->fetchAll();
?>

<h2>BUSCAR</h2>

<?php
    foreach ($results1 as $result) {
        echo "
        <article>
            <ul>
                <li><img src='{$result['RUTA_IMG']}' alt=''></li>
                <li>{$result['TITULO']}</li>
                <button><a href='archivo.php?id={$result['ID']}'>DESCARGAR</a></button>
            </ul>
        </article>
        ";
    }
?>