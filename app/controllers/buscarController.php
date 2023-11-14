<?php
    require_once('app/database/db.php');

    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    if (isset($_GET['tipo']) && !empty($_GET['tipo'])) {
        $tipo = $_GET['tipo'];

        if ($tipo==='series') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(TYPE) LIKE UPPER(?)");
            $typeParam = "SERIE";
            $sentence2->bindParam(1, $typeParam);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(TYPE) LIKE UPPER(?) LIMIT 20 OFFSET ?");
            $typeParam = "SERIE";
            $sentence1->bindParam(1, $typeParam);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($tipo==='series-hd') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "HDTV-720p";
            $typeParam2 = "BluRay-1080p";
            $typeParam3 = "HDTV";
            $typeParam4 = "HDTV-1080p";
            $typeParam5 = "BluRay-720p";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(FORMAT) IN (?, ?, ?, ?, ?) AND UPPER(TYPE) = 'SERIE'");
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
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(FORMAT) IN (?, ?, ?, ?, ?) LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $typeParam2);
            $sentence1->bindParam(3, $typeParam3);
            $sentence1->bindParam(4, $typeParam4);
            $sentence1->bindParam(5, $typeParam5);
            $sentence1->bindParam(6, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($tipo==='peliculas') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(TYPE) LIKE UPPER(?)");
            $typeParam = "PELICULA";
            $sentence2->bindParam(1, $typeParam);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(TYPE) LIKE UPPER(?) LIMIT 20 OFFSET ?");
            $typeParam = "PELICULA";
            $sentence1->bindParam(1, $typeParam);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($tipo==='peliculas-hd') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "HDTV-720p";
            $typeParam2 = "BluRay-1080p";
            $typeParam3 = "HDTV";
            $typeParam4 = "HDTV-1080p";
            $typeParam5 = "BluRay-720p";
            $typeParam6 = "4K";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(FORMAT) IN (?, ?, ?, ?, ?, ?) AND UPPER(TYPE) = 'PELICULA'");
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
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(FORMAT) IN (?, ?, ?, ?, ?, ?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $typeParam2);
            $sentence1->bindParam(3, $typeParam3);
            $sentence1->bindParam(4, $typeParam4);
            $sentence1->bindParam(5, $typeParam5);
            $sentence1->bindParam(6, $typeParam6);
            $sentence1->bindParam(7, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($tipo==='peliculas-4k') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "HDTV-720p";
            $typeParam2 = "BluRay-1080p";
            $typeParam3 = "HDTV";
            $typeParam4 = "HDTV-1080p";
            $typeParam5 = "BluRay-720p";
            $typeParam6 = "4K";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA'");
            $sentence2->bindParam(1, $typeParam6);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam6);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($tipo==='videojuegos') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(TYPE) LIKE UPPER(?)");
            $typeParam = "VIDEOJUEGO";
            $sentence2->bindParam(1, $typeParam);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(TYPE) LIKE UPPER(?) LIMIT 20 OFFSET ?");
            $typeParam = "VIDEOJUEGO";
            $sentence1->bindParam(1, $typeParam);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($tipo==='documentales') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(TYPE) LIKE UPPER(?)");
            $typeParam = "DOCUMENTAL";
            $sentence2->bindParam(1, $typeParam);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(TYPE) LIKE UPPER(?) LIMIT 20 OFFSET ?");
            $typeParam = "DOCUMENTAL";
            $sentence1->bindParam(1, $typeParam);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($tipo==='musica') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(TYPE) LIKE UPPER(?)");
            $typeParam = "MUSICA";
            $sentence2->bindParam(1, $typeParam);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(TYPE) LIKE UPPER(?) LIMIT 20 OFFSET ?");
            $typeParam = "MUSICA";
            $sentence1->bindParam(1, $typeParam);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }else {
            header('Location: index.php');
            die();
        }
    } elseif (isset($_GET['titulo']) && !empty($_GET['titulo'])) {
        $titulo = $_GET['titulo'];
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * 20;

        $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE LOWER(TITLE) LIKE LOWER(?)");
        $tituloParam = "%$titulo%";
        $sentence2->bindParam(1, $tituloParam);
        $sentence2->execute();
        $totalResults = $sentence2->fetchColumn();

        if ($totalResults === 0) {
            header('Location: index.php');
            die();
        }
    
        $totalPages = ceil($totalResults / 20);
    
        $minPage = max(1, $page - 3);
        $maxPage = min($totalPages, $page + 3);

        if ($page > $totalPages) {
            $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
            header("Location: buscar.php?$redirectParam&page=$totalPages");
            die();
        }

        $sentence1 = $db->prepare("SELECT * FROM files WHERE LOWER(TITLE) LIKE LOWER(?) LIMIT 20 OFFSET ?");
        $sentence1->bindParam(1, $tituloParam);
        $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
        $sentence1->execute();
        $results1 = $sentence1->fetchAll();
    }elseif (isset($_GET['formato']) && !empty($_GET['formato'])) {
        $formato = $_GET['formato'];

        if ($formato === '4k') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "4K";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA'");
            $sentence2->bindParam(1, $typeParam1);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($formato === 'bdremux-1080p') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "BDremux-1080p";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA'");
            $sentence2->bindParam(1, $typeParam1);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($formato === 'blueray-1080p') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "BluRay-1080p";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA'");
            $sentence2->bindParam(1, $typeParam1);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($formato === 'blueray-720p') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "BluRay-720p";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA'");
            $sentence2->bindParam(1, $typeParam1);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($formato === 'microhd-1080p') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "MicroHD-1080p";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA'");
            $sentence2->bindParam(1, $typeParam1);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }elseif ($formato === 'microhd-720p') {
            $page = $_GET['page'] ?? 1;
            $offset = ($page - 1) * 20;

            $typeParam1 = "MicroHD-720p";
    
            $sentence2 = $db->prepare("SELECT COUNT(*) AS COUNT FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA'");
            $sentence2->bindParam(1, $typeParam1);
            $sentence2->execute();
            $totalResults = $sentence2->fetchColumn();
        
            $totalPages = ceil($totalResults / 20);
        
            $minPage = max(1, $page - 3);
            $maxPage = min($totalPages, $page + 3);
    
            if ($page > $totalPages) {
                $redirectParam = isset($tipo) ? "tipo={$tipo}" : "titulo={$titulo}";
                header("Location: buscar.php?$redirectParam&page=$totalPages");
                die();
            }
    
            $sentence1 = $db->prepare("SELECT * FROM files WHERE UPPER(FORMAT) IN (?) AND UPPER(TYPE) = 'PELICULA' LIMIT 20 OFFSET ?");
            $sentence1->bindParam(1, $typeParam1);
            $sentence1->bindParam(2, $offset, PDO::PARAM_INT);
            $sentence1->execute();
            $results1 = $sentence1->fetchAll();
        }else {
            header('Location: index.php');
            die();
        }
    }
?>