<?php
    require_once('../database/db.php');
    require_once('functions/getNextIdEpisodes.php');
    require_once('../middlewares/checkSession.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    $file_id = $_POST['file_id'];

    $episode_titles = $_POST['episode_title'];
    $episode_int_file_routes = $_FILES['episode_int_file_route'];
    $episode_magnet_file_routes = $_POST['episode_magnet_file_route'];
    $numArchivos = count($_FILES['episode_int_file_route']['name']);

    if(isset($_FILES['episode_int_file_route'])) {
        $numArchivos = count($_FILES['episode_int_file_route']['name']);
    
        for($i = 0; $i < $numArchivos; $i++) {
            $lastEpisodeId = getNextIdEpisodes($db);
            $int_file = 'public/files/' . $lastEpisodeId . '.torrent';
            $url = 'http://ouo.io/api/seL94TsR?s=' . 'https://axtorrent.com/' . $int_file;
            $ouo_file_route = file_get_contents($url);
                   
            $nombreArchivo = $_FILES['episode_int_file_route']['name'][$i];
            $tipoArchivo = $_FILES['episode_int_file_route']['type'][$i];
            $tmpNombre = $_FILES['episode_int_file_route']['tmp_name'][$i];
            
            if (empty($episode_magnet_file_routes[$i])) {
                $sentence2 = $db->prepare("INSERT INTO episodes (ID, EPISODE, OUO_FILE_ROUTE, INT_FILE_ROUTE, UPLOAD_DATE, FILE_ID) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?)");
                $sentence2->bindParam(1, $lastEpisodeId);
                $sentence2->bindParam(2, $episode_titles[$i]);
                $sentence2->bindParam(3, $ouo_file_route);
                $sentence2->bindParam(4, $int_file);
                $sentence2->bindParam(5, $file_id);
                $sentence2->execute();
    
                $rutaDestino = "../../public/files/" . $lastEpisodeId . '.torrent';
                move_uploaded_file($tmpNombre, $rutaDestino);
                
                echo "El archivo $nombreArchivo se subió correctamente.";
            }else {
                $sentence2 = $db->prepare("INSERT INTO episodes (ID, EPISODE, OUO_FILE_ROUTE, MAGNET_FILE_ROUTE, UPLOAD_DATE, FILE_ID) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?)");
                $sentence2->bindParam(1, $lastEpisodeId);
                $sentence2->bindParam(2, $episode_titles[$i]);
                $sentence2->bindParam(3, $ouo_file_route);
                $sentence2->bindParam(4, $episode_magnet_file_routes[$i]);
                $sentence2->bindParam(5, $file_id);
                $sentence2->execute();
    
                $rutaDestino = "../../public/files/" . $lastEpisodeId . '.torrent';
                move_uploaded_file($tmpNombre, $rutaDestino);
                
                echo "El archivo $nombreArchivo se subió correctamente.";
            }
        }
    }

    header('Location: ../../dashboard.php');
?>