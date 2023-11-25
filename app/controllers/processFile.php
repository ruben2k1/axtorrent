<?php
    require_once('../database/db.php');
    require_once('functions/getNextIdEpisodes.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $genre = $_POST['genre'];
    $format = $_POST['format'];
    $director = $_POST['director'];
    $cast = $_POST['cast'];
    $ext_img_route = $_POST['ext_img_route'];
    $release_date = !empty($_POST['release_date']) ? $_POST['release_date'] : null;
    $userid = 1;

    switch ($type) {
        case 'SERIE':
            $sentence1 = $db->prepare("INSERT INTO files (TITLE, DESCRIPTION, TYPE, FORMAT, EXT_IMG_ROUTE, RELEASE_DATE, UPLOAD_DATE, USER_ID) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?)");
            $sentence1->bindParam(1, $title);
            $sentence1->bindParam(2, $description);
            $sentence1->bindParam(3, $type);
            $sentence1->bindParam(4, $format);
            $sentence1->bindParam(5, $ext_img_route);
            $sentence1->bindParam(6, $release_date);
            $sentence1->bindParam(7, $userid);
            $sentence1->execute();

            $file_id = intval($db->lastInsertId());

            $episode_titles = $_POST['episode_title'];
            $episode_int_file_routes = $_FILES['episode_int_file_route'];
            $episode_dates = $_POST['episode_date'];
            
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
                }
            }
    
            header('Location: ../../dashboard.php');
            break;
        case 'PELICULA':
            $sentence1 = $db->prepare("INSERT INTO files (TITLE, DESCRIPTION, TYPE, GENRE, FORMAT, DIRECTOR, CAST, EXT_IMG_ROUTE, RELEASE_DATE, UPLOAD_DATE, USER_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?)");
            $sentence1->bindParam(1, $title);
            $sentence1->bindParam(2, $description);
            $sentence1->bindParam(3, $type);
            $sentence1->bindParam(4, $genre);
            $sentence1->bindParam(5, $format);
            $sentence1->bindParam(6, $director);
            $sentence1->bindParam(7, $cast);
            $sentence1->bindParam(8, $ext_img_route);
            $sentence1->bindParam(9, $release_date);
            $sentence1->bindParam(10, $userid);
            $sentence1->execute();
    
            $file_id = intval($db->lastInsertId());
    
            $episode_titles = $_POST['episode_title'];
            $episode_int_file_routes = $_FILES['episode_int_file_route'];
            $episode_dates = $_POST['episode_date'];
    
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
                }
            }
    
            header('Location: ../../dashboard.php');
            break;
        case 'DOCUMENTAL':
            $sentence1 = $db->prepare("INSERT INTO files (TITLE, DESCRIPTION, TYPE, FORMAT, EXT_IMG_ROUTE, RELEASE_DATE, UPLOAD_DATE, USER_ID) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?)");
            $sentence1->bindParam(1, $title);
            $sentence1->bindParam(2, $description);
            $sentence1->bindParam(3, $type);
            $sentence1->bindParam(4, $format);
            $sentence1->bindParam(5, $ext_img_route);
            $sentence1->bindParam(6, $release_date);
            $sentence1->bindParam(7, $userid);
            $sentence1->execute();

            $file_id = intval($db->lastInsertId());

            $episode_titles = $_POST['episode_title'];
            $episode_int_file_routes = $_FILES['episode_int_file_route'];
            $episode_dates = $_POST['episode_date'];
            
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
                }
            }
    
            header('Location: ../../dashboard.php');
            break;
        case 'VIDEOJUEGO':
            $sentence1 = $db->prepare("INSERT INTO files (TITLE, TYPE, EXT_IMG_ROUTE, RELEASE_DATE, UPLOAD_DATE, USER_ID) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?)");
            $sentence1->bindParam(1, $title);
            $sentence1->bindParam(2, $type);
            $sentence1->bindParam(3, $ext_img_route);
            $sentence1->bindParam(4, $release_date);
            $sentence1->bindParam(5, $userid);
            $sentence1->execute();
    
            $file_id = intval($db->lastInsertId());
    
            $episode_titles = $_POST['episode_title'];
            $episode_int_file_routes = $_FILES['episode_int_file_route'];
            $episode_dates = $_POST['episode_date'];
    
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
                }
            }
    
            header('Location: ../../dashboard.php');
            break;
        
        default:
            break;
    }
?>