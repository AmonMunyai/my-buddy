<?php
    if (isset($_POST['forgot-submit'])) {
        require_once "../core/init.php";

        $user_email = $_POST['email'];

        $sql = "SELECT * FROM user_account WHERE user_email=?";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . "/index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $user_email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if ($result == 1) {
                header("Location: " . ROOT_URL . "/index.php?passwordreset=success");
                exit();    
            } else {
                header("Location: " . ROOT_URL . "/index.php?error=nouser");
                exit();
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    } else {
        header("Location: " . ROOT_URL . "/index.php");
        exit();
    }
?>