<?php
    session_start();

    $error = $_SESSION['error'];

    if ($error === true) {
        $_SESSION['error'] = false;

        header('Location: index.php');

        die();
    }
?>