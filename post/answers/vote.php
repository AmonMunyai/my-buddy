<?php
    require_once "../../core/init.php";

    if (isset($_GET['id'])) {
        $post_id = $_GET['post_id'];
        $post_answer_id = (string) $_GET['id'];
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM post_answer_vote WHERE post_id=" . $post_answer_id;
        $post_answer_number_of_votes = mysqli_num_rows(mysqli_query($connection, $sql));

        $sql = "SELECT * FROM post_answer_vote WHERE post_id=" . $post_answer_id;
        $result = mysqli_fetch_assoc(mysqli_query($connection, $sql));

        if ($_GET['vote'] == "up" && $result['user_id'] != $user_id) {
            $sql = "INSERT INTO post_answer_vote (post_id, user_id) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: " . ROOT_URL . '/post/question.php?id=' . $post_id . "&error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $post_answer_id, $user_id);
                mysqli_stmt_execute($stmt);
                
                $post_answer_number_of_votes += 1;
                
                $sql = "UPDATE post_answer SET post_answer_number_of_votes=$post_answer_number_of_votes WHERE id=" . $post_answer_id;
                mysqli_query($connection, $sql);
                header("Location: " . ROOT_URL . '/post/question.php?id=' . $post_id . "&vote=success");
                exit();
            }
        } else if ($_GET['vote'] == "down" && $result['user_id'] == $user_id) {
            $sql = "DELETE FROM post_answer_vote WHERE user_id=? AND post_id=?";
            $stmt = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: " . ROOT_URL . '/post/question.php?id=' . $post_id . "&error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $user_id, $post_answer_id);
                mysqli_stmt_execute($stmt);

                $post_answer_number_of_votes -= 1;
                
                $sql = "UPDATE post_answer SET post_answer_number_of_votes=$post_answer_number_of_votes WHERE id=" . $post_answer_id;
                mysqli_query($connection, $sql);
                header("Location: " . ROOT_URL . '/post/question.php?id=' . $post_id . "&vote=success");
                exit();
            }
        } else {
            header("Location: " . ROOT_URL . '/post/question.php?id=' . $post_id);
            exit();
        };
    } else {
        header("Location: " . ROOT_URL . '/post/question.php?id=' . $post_id);
        exit();
    }
?>