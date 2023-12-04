<?php
    session_start();
    
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    } else {
        header('Location: index.php');
        die();
    }
?>