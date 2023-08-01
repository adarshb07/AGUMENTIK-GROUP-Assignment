<?php
    session_start();

    function redirect($url, $permanent = false){
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }

    if(isset($_SESSION['login']) && $_SESSION['login']!=true){
        redirect('./index.php', false);
    }
?>