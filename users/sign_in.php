<?php
    session_start();
    if (isset($_POST['login-submit'])) {
        require_once "../core/init.php";

        $user_email = $_POST["email"];
        $user_password = $_POST["password"];

        $sql = "SELECT * FROM user_account WHERE user_email=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . "/index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $user_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $check_password = password_verify($user_password, $row['user_password']);
                if ($check_password == false) {
                    header("Location: " . ROOT_URL . "/index.php?error=incorrectpassword");
                    exit();
                } else if ($check_password == true) {
                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_firstname'] = $row['user_firstname'];
                    $_SESSION['user_lastname'] = $row['user_lastname'];
                    $_SESSION['user_username'] = $row['user_firstname'] . $row['user_lastname'];
                    header("Location: " . ROOT_URL . "/dashboard.php?login=success");
                    exit();    
                }
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