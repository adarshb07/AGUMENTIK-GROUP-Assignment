<?php
    session_start();    
    $_SESSION['login'] = false;

    redirect('./index.php');

    function redirect($url, $permanent = false){
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
?>