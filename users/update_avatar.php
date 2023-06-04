<?php
    require_once "../core/init.php";

    if (isset($_POST['upload-avatar-submit'])) {
        $user_id = $_SESSION['user_id'];
        $file = $_FILES['user_avatar'];
        $file_ext = explode('.', $file['name']);
        $file_ext = strtolower(end($file_ext));

        if ($file['error'] != 0) {
            header("Location: " . ROOT_URL . "/dashboard.php?error=uploadfile");
            exit();
        }

        move_uploaded_file($file['tmp_name'], "../public/assets/images/" . time() . "." . $file_ext);

        $user_avatar = ROOT_URL . "/public/assets/images/" . time() . "." . $file_ext;

        $sql = "UPDATE user SET user_avatar = ? WHERE id = ?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . "/dashboard.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $user_avatar, $user_id);
            mysqli_stmt_execute($stmt);

            $sql = "UPDATE post SET post_created_by_avatar = ? WHERE post_created_by_id = ?";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: " . ROOT_URL . "/dashboard.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $user_avatar, $user_id);
                mysqli_stmt_execute($stmt);

                $sql = "UPDATE post_answer SET post_answer_created_by_avatar = ? WHERE post_answer_created_by_id = ?";
                $stmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: " . ROOT_URL . "/dashboard.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $user_avatar, $user_id);
                    mysqli_stmt_execute($stmt);

                    $sql = "UPDATE user_notification SET user_notification_image = ? WHERE user_notification_created_by_id = ?";
                    $stmt = mysqli_stmt_init($connection);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: " . ROOT_URL . "/dashboard.php?error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "ss", $user_avatar, $user_id);
                        mysqli_stmt_execute($stmt);

                        $_SESSION['user_avatar'] = $user_avatar;
            
                        mysqli_stmt_close($stmt);
                        mysqli_close($connection);
                
                        header("Location: " . ROOT_URL . "/dashboard.php?uploadfile=success");
                        exit();
                    }        
                }
            }
        }
    } else {
        header("Location: " . ROOT_URL . "/dashboard.php");
        exit();
    }