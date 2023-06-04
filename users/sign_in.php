<?php
    require_once "../core/init.php";

    if (isset($_POST['login-submit'])) {

        $user_email = $_POST["email"];
        $user_password = $_POST["password"];

        $sql = "SELECT * FROM user WHERE user_email=? OR user_username=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . "/index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $user_email, $user_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $check_password = password_verify($user_password, $row['user_password']);
                if ($check_password == false) {
                    header("Location: " . ROOT_URL . "/index.php?error=passwordnomatch");
                    exit();
                } else if ($check_password == true) {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_username'] = $row['user_username'];
                    $_SESSION['user_avatar'] = $row['user_avatar'];

                    header("Location: " . ROOT_URL . "/dashboard.php?login=");
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