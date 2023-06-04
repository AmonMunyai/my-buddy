<?php
    require_once "../core/init.php";

    if (isset($_POST['join-submit'])) {

        $user_username = strtolower($_POST["username"]);
        $user_email = strtolower($_POST["email"]);
        $user_password = $_POST["password"];

        if (empty($user_username) || empty($user_email) || empty($user_password)) {
            header("Location: " . ROOT_URL . "/index.php?error=emptyfields");
            exit();
        } elseif (!preg_match("/^[a-zA-Z0-9.\-_$@*!]{3,30}$/", $user_username)) {
            header("Location: " . ROOT_URL . "/index.php?error=invalidusername");
            exit();
        } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            header("Location: " . ROOT_URL . "/index.php?error=invalidmail&email=".$user_email);
            exit();
        } elseif (strlen($user_password) < 8) {
            header("Location: " . ROOT_URL . "/index.php?error=passwordtooshort");
            exit();
        } elseif (!preg_match("@[A-Z]@", $user_password)) {
            header("Location: " . ROOT_URL . "/index.php?error=passwordnouppercase");
            exit();
        } elseif(!preg_match("@[a-z]@", $user_password)) {
            header("Location: " . ROOT_URL . "/index.php?error=passwordnolowercase");
            exit();
        } elseif(!preg_match("@[0-9]@", $user_password)) {
            header("Location: " . ROOT_URL . "/index.php?error=passwordnonumber");
            exit();
        } else {
            $sql = "SELECT * FROM user WHERE user_email=?";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: " . ROOT_URL . "/index.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $user_email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);
                if ($result > 0) {
                    header("Location: " . ROOT_URL . "/index.php?error=mailalreadytaken");
                    exit();    
                } else {

                    $random_data_api = file_get_contents("https://random-data-api.com/api/v2/users?response_type=json");
                    if ($random_data_api) {
                        $user_avatar = json_decode($random_data_api)->avatar;
                    } else {
                        $user_avatar = ROOT_URL . "/public/assets/images/blank-profile-picture.png";
                    }
        
                    $sql = "INSERT INTO user (user_username, user_email, user_password, user_avatar) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($connection);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: " . ROOT_URL . "/index.php?error=sqlerror");
                        exit();
                    } else {
                        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ssss", $user_username, $user_email, $hash_password, $user_avatar);
                        mysqli_stmt_execute($stmt);
                        header("Location: " . ROOT_URL . "/index.php?signup=success");
                        exit();
                    }        
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($connection);
        }
    } else {
        header("Location: " . ROOT_URL . "/index.php");
        exit();    
    }