<?php
    require('app/database/db.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    if (isset($_GET['type']) && !empty($_GET['type'])) {
        $type = $_GET['type'];

        if ($type==='series') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM FILES WHERE UPPER(TYPE) LIKE UPPER(?)");
            $typeParam = "SERIE";
            $sentence2->bindParam(1, $typeParam);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($type) ? "type={$type}" : "title={$title}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM FILES WHERE UPPER(TYPE) LIKE UPPER(?) LIMIT 20 OFFSET ?");
            $typeParam = "SERIE";
            $sentence1->bindParam(1, $typeParam);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($type==='series-hd') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "HDTV-720p";
            $typeParam2 = "BluRay-1080p";
            $typeParam3 = "HDTV";
            $typeParam4 = "HDTV-1080p";
            $typeParam5 = "BluRay-720p";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM FILES WHERE UPPER(FORMAT) IN (?, ?, ?, ?, ?) AND UPPER(TYPE) = 'SERIE'");
            $sentence2->bindParam(1, $typeParam1);
            $sentence2->bindParam(2, $typeParam2);
            $sentence2->bindParam(3, $typeParam3);
            $sentence2->bindParam(4, $typeParam4);
            $sentence2->bindParam(5, $typeParam5);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($type) ? "type={$type}" : "title={$title}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM FILES WHERE UPPER(FORMAT) IN (?, ?, ?, ?, ?) LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $typeParam2);
            $sentence1->bindParam(3, $typeParam3);
            $sentence1->bindParam(4, $typeParam4);
            $sentence1->bindParam(5, $typeParam5);
            $sentence1->bindParam(6, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($type==='peliculas') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM FILES WHERE UPPER(TYPE) LIKE UPPER(?)");
            $typeParam = "PELICULA";
            $sentence2->bindParam(1, $typeParam);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($type) ? "type={$type}" : "title={$title}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM FILES WHERE UPPER(TYPE) LIKE UPPER(?) LIMIT 20 OFFSET ?");
            $typeParam = "PELICULA";
            $sentence1->bindParam(1, $typeParam);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($type==='peliculas-hd') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "HDTV-720p";
            $typeParam2 = "BluRay-1080p";
            $typeParam3 = "HDTV";
            $typeParam4 = "HDTV-1080p";
            $typeParam5 = "BluRay-720p";
            $typeParam6 = "4K";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM FILES WHERE UPPER(FORMAT) IN (?, ?, ?, ?, ?, ?) AND UPPER(TYPE) = 'PELICULA'");
            $sentence2->bindParam(1, $typeParam1);
            $sentence2->bindParam(2, $typeParam2);
            $sentence2->bindParam(3, $typeParam3);
            $sentence2->bindParam(4, $typeParam4);
            $sentence2->bindParam(5, $typeParam5);
            $sentence2->bindParam(6, $typeParam6);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($type) ? "type={$type}" : "title={$title}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM FILES WHERE UPPER(FORMAT) IN (?, ?, ?, ?, ?, ?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $typeParam2);
            $sentence1->bindParam(3, $typeParam3);
            $sentence1->bindParam(4, $typeParam4);
            $sentence1->bindParam(5, $typeParam5);
            $sentence1->bindParam(6, $typeParam6);
            $sentence1->bindParam(7, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($type==='peliculas-4k') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "HDTV-720p";
            $typeParam2 = "BluRay-1080p";
            $typeParam3 = "HDTV";
            $typeParam4 = "HDTV-1080p";
            $typeParam5 = "BluRay-720p";
            $typeParam6 = "4K";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM FILES WHERE UPPER(FORMAT) IN (?, ?, ?, ?, ?, ?) AND UPPER(TYPE) = 'PELICULA'");
            $sentence2->bindParam(1, $typeParam1);
            $sentence2->bindParam(2, $typeParam2);
            $sentence2->bindParam(3, $typeParam3);
            $sentence2->bindParam(4, $typeParam4);
            $sentence2->bindParam(5, $typeParam5);
            $sentence2->bindParam(6, $typeParam6);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($type) ? "type={$type}" : "title={$title}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM FILES WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam6);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }
    } elseif (isset($_GET['title']) && !empty($_GET['title'])) {
        $title = $_GET['title'];
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 20;

        $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM FILES WHERE LOWER(TITLE) LIKE LOWER(?)");
        $tituloParam = "%$title%";
        $sentence2->bindParam(1, $tituloParam);
        $sentence2->execute();
        $totalResults = $sentence2->fetchColumn();
    
        $totalPages = ceil($totalResults / 20);
    
        $minPage = max(1, $page - 3);
        $maxPage = min($totalPages, $page + 3);

        if ($page > $totalPages) {
            $redirectParam = isset($type) ? "type={$type}" : "title={$title}";
            header("Location: buscar.php?$redirectParam&page=$totalPages");
            die();
        }

        $sentence1 = $db->prepare("SELECT * FROM FILES WHERE LOWER(TITLE) LIKE LOWER(?) LIMIT 20 OFFSET ?");
        $sentence1->bindParam(1, $tituloParam);
        $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
        $sentence1->execute();
        $results1 = $sentence1->fetchAll();
    } else {
        header('Location: index.php');
        die();
    }
?>