<?php
    require_once "./core/init.php";
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . ROOT_URL . "/index.php");
        exit();
    }
?>