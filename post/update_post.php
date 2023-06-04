<?php
    require_once "../core/init.php";
    $post_id = $_GET['id'];

    if (isset($_POST['post-update-submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];

        if (!preg_match("/^[a-zA-Z0-9_]+(?:\W+[a-zA-Z0-9_]+)*\W*$/", $title)) {
            header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "error=invalidtitle&content=" . $content);
            exit();
        } else {
                $sql = "UPDATE post SET post_title=?, post_content=?, post_created_date=now() WHERE id=?";
                $stmt = mysqli_stmt_init($connection);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "sss", $title, $content, $post_id);
                    mysqli_stmt_execute($stmt);
                    header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&updatepost=success");
                    exit();
                }
        }
    } else if (isset($_POST['post-delete-submit'])) {
        $sql = "DELETE FROM post WHERE id=?";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $post_id);
            mysqli_stmt_execute($stmt);
            $sql = "DELETE FROM post_answer WHERE post_id=?";
            $stmt = mysqli_stmt_init($connection);
    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $post_id);
                mysqli_stmt_execute($stmt);
                header("Location: " . ROOT_URL . "/dashboard.php?deletepost=success");
                exit();
            }
        }
    } else {
        header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id);
        exit();                
    }
?>