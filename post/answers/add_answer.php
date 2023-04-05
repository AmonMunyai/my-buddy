<?php
    require_once "../../core/init.php";

    if (isset($_POST['answer-submit'])) {
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . ROOT_URL . "/dashboard.php?error=invaliduser");
            exit();
        }

        $post_id = (string) $_GET['post_id'];
        $content = $_POST['answer_content'];
        $created_by = $_SESSION['user_firstname'] . $_SESSION['user_lastname'];

        if (!preg_match("/^[a-zA-Z0-9_]+(?:\W+[a-zA-Z0-9_]+)*\W*$/", $content)) {
            header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=invalidinput");
            exit();
        } else {
            $sql = "INSERT INTO post_answer (post_id, post_answer_content, post_answer_created_date, post_answer_created_by, post_answer_number_of_votes) VALUES (?, ?, now(), ?, 0)";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $post_id, $content, $created_by);
                mysqli_stmt_execute($stmt);
                header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&addanswer=success");
                exit();
            } 
        }

    } else {
        header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id);
        exit();
    }
?>