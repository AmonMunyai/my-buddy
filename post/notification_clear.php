<?php
    require_once "../core/init.php";

    if (!isset($_SESSION['user_id'])) {
        header("Location: " . ROOT_URL . "/dashboard.php?error=invaliduser");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM user_notification WHERE user_id=" . $user_id;
    mysqli_query($connection, $sql);

    header("Location: " . ROOT_URL . "/dashboard.php?notificationclear=success");
    exit();