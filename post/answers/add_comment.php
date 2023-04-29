<?php
    require_once "../../core/init.php";

    if (isset($_POST['comment-submit'])) {
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . ROOT_URL . "/dashboard.php?error=invaliduser");
            exit();
        }

        $post_id = (string) $_GET['post_id'];
        $post_answer_id = (string) $_GET['post_answer_id'];
        $content = $_POST['comment_content'];
        $created_by = $_SESSION['user_username'];

        exit();

        if (!preg_match("/^[a-zA-Z0-9_]+(?:\W+[a-zA-Z0-9_]+)*\W*$/", $content)) {
            header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=invalidinput");
            exit();
        } else {
            $sql = "INSERT INTO post_answer_comment (post_answer_id, post_answer_comment_content, post_answer_comment_created_date, post_answer_comment_created_by, post_answer_comment_number_of_votes) VALUES (?, ?, now(), ?, 0)";
            $stmt = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $post_answer_id, $content, $created_by);
                mysqli_stmt_execute($stmt);

                $sql = "UPDATE post SET post_number_of_answers=? WHERE id=?";
                $stmt = mysqli_stmt_init($connection);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $post_number_of_answers, $post_id);
                    mysqli_stmt_execute($stmt);
                    header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&addanswer=success");
                    exit();
                }
            } 
        }
    } else {
        header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id);
        exit();
    }
