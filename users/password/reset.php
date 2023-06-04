<?php
    require_once "../../core/init.php";

    if (isset($_POST['reset-submit'])) {

        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if (empty($password) || empty($password_confirm)) {
            header("Location: " . ROOT_URL . "/users/password/new.php?selector=" . $selector . "&validator=" . $validator . "&password=empty");
            exit();
        } else if ($password != $password_confirm) {
            header("Location: " . ROOT_URL . "/users/password/new.php?selector=" . $selector . "&validator=" . $validator . "&password=nomatch");
            exit();
        }

        $current_date = date("U");

        $sql = "SELECT * FROM password_reset WHERE password_reset_selector = ? AND password_reset_expires >= $current_date";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . "/users/password/new.php?selector=" . $selector . "&validator=" . $validator . "&error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $selector);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            if (!$row) {
                echo "You need to re-submit your reset request.";
                exit();
            } else {
                $token_bin = hex2bin($validator);
                $token_check = password_verify($token_bin, $row['password_reset_token']);

                if ($token_check === false) {
                    echo "You need to re-submit your reset request.";
                    exit();    
                } else if ($token_check === true) {
                    $token_email = $row['password_reset_email'];

                    $sql = "SELECT * FROM user WHERE user_email = ?";
                    $stmt = mysqli_stmt_init($connection);
                
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: " . ROOT_URL . "/users/password/new.php?selector=" . $selector . "&validator=" . $validator . "&error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $token_email);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_assoc($result);

                        if (!$row) {
                            header("Location: " . ROOT_URL . "/users/password/new.php?error=invalid");
                            exit();
                        } else {
                            $sql = "UPDATE user SET user_password = ? WHERE user_email = ?";
                            $stmt = mysqli_stmt_init($connection);
                        
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("Location: " . ROOT_URL . "/users/password/new.php?selector=" . $selector . "&validator=" . $validator . "&error=sqlerror");
                                exit();
                            } else {
                                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $hash_password, $token_email);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM password_reset WHERE password_reset_email = ?";
                                $stmt = mysqli_stmt_init($connection);
                            
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("Location: " . ROOT_URL . "/users/password/new.php?selector=" . $selector . "&validator=" . $validator . "&error=sqlerror");
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($stmt, "s", $token_email);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: " . ROOT_URL . "/index.php?success=passwordupdate");
                                }
                            }
                        }
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