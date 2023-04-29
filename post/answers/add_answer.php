<?php
    require_once "../../core/init.php";

    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['answer-submit'])) {
        require_once "../../PHPMailer/PHPMailer.php";
        require_once "../../PHPMailer/SMTP.php";
        require_once "../../PHPMailer/Exception.php";
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . ROOT_URL . "/dashboard.php?error=invaliduser");
            exit();
        }

        $post_id = (string) $_GET['post_id'];

        $content = $_POST['answer_content'];
        $created_by = strtolower($_SESSION['user_username']);
        $created_by_id = $_SESSION['user_id'];
        $created_by_avatar = $_SESSION['user_avatar'];

        $sql = "SELECT * FROM post WHERE id=" . $post_id;
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $notification_id = $row['post_created_by_id'];
        $notification_email_status = $row['post_notification_email_status'];
        $post_title = $row['post_title'];
        $post_content = $row['post_content'];
        $post_created_by_id = $row['post_created_by_id'];

        $sql = "SELECT user_email FROM user_account WHERE id=" . $post_created_by_id;
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $user_email = $row['user_email'];

        $sql = "SELECT * FROM post_answer WHERE post_id=" . $post_id;
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);

        $post_number_of_answers = mysqli_num_rows($result);
        $post_number_of_answers += 1;

        if (!preg_match("/^[a-zA-Z0-9_]+(?:\W+[a-zA-Z0-9_]+)*\W*$/", $content)) {
            header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=invalidinput");
            exit();
        } else {
            $sql = "INSERT INTO post_answer (post_id, post_answer_content, post_answer_created_date, post_answer_created_by, post_answer_created_by_id, post_answer_created_by_avatar, post_answer_number_of_votes) VALUES (?, ?, now(), ?, ?, ?, 0)";
            $stmt = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sssss", $post_id, $content, $created_by, $created_by_id, $created_by_avatar);
                mysqli_stmt_execute($stmt);

                $sql = "UPDATE post SET post_number_of_answers=? WHERE id=?";
                $stmt = mysqli_stmt_init($connection);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $post_number_of_answers, $post_id);
                    mysqli_stmt_execute($stmt);

                    if ($notification_id == $created_by_id) {
                        header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&addanswer=success");
                        exit();
                    }

                    $notification_link = ROOT_URL . "/post/question.php?id=" . $post_id;

                    if (strlen($content) > 34) {
                        $notification_message = substr($content, 0, 34) . "...";
                    } else {
                        $notification_message = $content;
                    }

                    $sql = "INSERT INTO user_notification (user_notification_image, user_notification_message, user_notification_created_by_id, user_notification_link, user_id) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($connection);
    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "sssss", $created_by_avatar, $notification_message, $created_by_id, $notification_link, $notification_id);
                        mysqli_stmt_execute($stmt);

                        if ($notification_email_status == 1) {
                            $mail = new PHPMailer();

                            // SMTP Settings
                            $mail->isSMTP();
                            $mail->Host = "smtp.gmail.com";
                            $mail->SMTPAuth = true;
                            $mail->Username = "Kaisermrepper@gmail.com";
                            $mail->Password = "opbvoepwqlfigxkg";
                            $mail->Port = 465; // 587
                            $mail->SMTPSecure = "ssl"; // tls
                    
                            $email = "mybuddy@gmail.com";
                            $name = "myBuddy";
                    
                            $subject = 'New answer to your post "' . $post_title . '"';
                            $message = "<p><strong>Author</strong>: " . $created_by . ".</p>";
                            $message .= "<p><strong>Comment</strong>: " . $content . "</p>";
                            $message .= "<p>You can see all comments on this post here:</p>";
                            $message .= "<p>" . ROOT_URL . "/post/question.php?id=" . $post_id . "</p>";
                    
                            // Email settings
                            $mail->setFrom($email, $name);
                            $mail->addAddress($user_email);
                    
                            $mail->isHTML(true);
                            $mail->Subject = $subject;
                            $mail->Body = $message;
                    
                            if (!$mail->send()) {
                                header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&error=mailsend");
                                exit();
                            }
                        }                

                        header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id . "&addanswer=success");
                        exit();
                    }
                }
            } 
        }
    } else {
        header("Location: " . ROOT_URL . "/post/question.php?id=" . $post_id);
        exit();
    }
?>