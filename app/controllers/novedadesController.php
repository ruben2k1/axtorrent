<?php
    require('app/database/db.php');

    $db = new Connection('localhost', 'filedown', 3306, 'root', '');

    $sentence1 = $db->prepare("SELECT * FROM ARCHIVOS GROUP BY FECHA_SUBIDA DESC");
    $sentence1->execute();
    $results1 = $sentence1->fetchAll();
?>

<h2>👇🏻 ÚLTIMOS ARCHIVOS AÑADIDOS</h2>

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