<?php
    require_once "../core/init.php";
    session_start();
    session_unset();
    session_destroy();
    header("Location: " . ROOT_URL . "/index.php");
?>