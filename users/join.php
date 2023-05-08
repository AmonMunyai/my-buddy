<?php
    require_once "../core/init.php";

    if (isset($_POST['join-submit'])) {

        $user_firstname = strtolower($_POST["firstname"]);
        $user_lastname = strtolower($_POST["lastname"]);
        $user_email = strtolower($_POST["email"]);
        $user_password = $_POST["password"];

        $result = file_get_contents("https://random-data-api.com/api/v2/users?response_type=json");
        $user_avatar = json_decode($result)->avatar;
        
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            header("Location: " . ROOT_URL . "/index.php?error=invalidmail&email=".$user_email);
            exit();
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $user_firstname)) {
            header("Location: " . ROOT_URL . "/index.php?error=invalidfirstname&lastname=".$user_lastname);
            exit();
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $user_lastname)) {
            header("Location: " . ROOT_URL . "/index.php?error=invalidlastname&firstname=".$user_firstname);
            exit();
        } else {
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
                if ($result > 0) {
                    header("Location: " . ROOT_URL . "/index.php?error=mailalreadytaken");
                    exit();    
                } else {
                    $sql = "INSERT INTO user_account (user_firstname, user_lastname, user_email, user_password, user_avatar) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($connection);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: " . ROOT_URL . "/index.php?error=sqlerror");
                        exit();
                    } else {
                        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sssss", $user_firstname, $user_lastname, $user_email, $hash_password, $user_avatar);
                        mysqli_stmt_execute($stmt);
                        header("Location: " . ROOT_URL . "/index.php?signup=success");
                        exit();
                    }        
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    } else {
        header("Location: " . ROOT_URL . "/index.php");
        exit();    
    }
?>