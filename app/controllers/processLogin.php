<?php
    require('../database/db.php');

    session_start();
    
    $db = new Connection('localhost', 'axtorrent', 3307, 'root', 'EC5B09B113AC14D6FF0481665B469AA560CE662E7E87BF57C344FC4E03844B8C');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sentence1 = $db->prepare("SELECT * FROM users WHERE USERNAME = ?");
    $sentence1->bindParam(1, $username);
    $sentence1->execute();

    if ($sentence1->rowCount() === 1) {
        $results1 = $sentence1->fetch();

        $hash = $results1['PASSWORD'];

        if (password_verify($password, $hash)) {
            $_SESSION['username'] = $username;
            
            header('Location: ../../login.php');
            die();
        }else{
            header('Location: ../../login.php');
            die();
        }
    }else{
        header('Location: ../../login.php');
        die();
    }
?>