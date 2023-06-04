<?php
    require_once "../core/init.php";

    if (isset($_POST['remove-avatar-submit'])) {
        $user_id = $_SESSION['user_id'];
        $user_avatar = ROOT_URL . "/public/assets/images/blank-profile-picture.png";

        $file = "../public/assets/images/" . $user_id . ".*";

        if (file_exists($file)) {
            if (!array_map('unlink', glob($file))) {
                header("Location: " . ROOT_URL . "/dashboard.php?error=removefile");
                exit();
            }    
        }

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
            
                        mysqli_stmt_close($stmt);
                        mysqli_close($connection);
                
                        header("Location: " . ROOT_URL . "/dashboard.php?removefile=success");
                        exit();
                    }        
                }
            }
        }
    } else {
        header("Location: " . ROOT_URL . "/dashboard.php");
        exit();
    }