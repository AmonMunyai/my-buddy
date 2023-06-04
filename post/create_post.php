<?php
    require_once "../core/init.php";

    if (isset($_POST['post-submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $created_by = $_SESSION['user_username'];
        $created_by_id = $_SESSION['user_id'];
        $created_by_avatar = $_SESSION['user_avatar'];

        $notification_email_status = $_POST['mailsend'] ?? 0;

        if (!preg_match("/^[a-zA-Z0-9_]+(?:\W+[a-zA-Z0-9_]+)*\W*$/", $title)) {
            header("Location: " . ROOT_URL . "/dashboard.php?error=invalidtitle&content=".$content);
            exit();
        } else {
            $sql = "INSERT INTO post (post_title, post_content, post_created_date, post_created_by, post_created_by_id, post_created_by_avatar, post_number_of_answers, post_notification_email_status) VALUES (?, ?, now(), ?, ?, ?, 0, ?)";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: " . ROOT_URL . "/index.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ssssss", $title, $content, $created_by, $created_by_id, $created_by_avatar, $notification_email_status);
                mysqli_stmt_execute($stmt);
                header("Location: " . ROOT_URL . "/dashboard.php?createpost=success");
                exit();
            } 
        }

    } else {
        header("Location: " . ROOT_URL . "/dashboard.php");
        exit();
    }
?>