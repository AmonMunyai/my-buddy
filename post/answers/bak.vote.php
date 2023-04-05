<?php
    require_once "../../core/init.php";

    if (isset($_GET['id'])) {

        if ($_GET['vote'] == "down") {
            $sql = "UPDATE post_answer SET post_answer_number_of_votes = post_answer_number_of_votes - 1 WHERE id=?";
        } else if ($_GET['vote'] == "up") {
            $sql = "UPDATE post_answer SET post_answer_number_of_votes = post_answer_number_of_votes + 1 WHERE id=?";
        } else {
            exit();
        }

        $post_id = (string) $_GET['post_id'];;
        $post_answer_id = (string) $_GET['id'];

        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . '/post/question.php?id=' . $post_id . "&error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $post_answer_id);
            mysqli_stmt_execute($stmt);
            header("Location: " . ROOT_URL . '/post/question.php?id=' . $post_id . "&vote=success");
            exit();
        } 
    } else {
        header("Location: " . ROOT_URL . '/post/question.php?id=' . $post_id);
        exit();
    }
?>