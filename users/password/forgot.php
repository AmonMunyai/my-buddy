<?php

    require_once "../../core/init.php";

    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['forgot-submit'])) {

        require_once "../../PHPMailer/PHPMailer.php";
        require_once "../../PHPMailer/SMTP.php";
        require_once "../../PHPMailer/Exception.php";

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        $url = ROOT_URL . "/users/password/new.php?selector=" . $selector . "&validator=" . bin2hex($token);
        $expires = date("U") + 1800;

        $user_email = $_POST['email'];

        $sql = "DELETE FROM password_reset WHERE password_reset_email=?";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . "/index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $user_email);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO password_reset(password_reset_email, password_reset_selector, password_reset_token, password_reset_expires) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . "/index.php?error=sqlerror");
            exit();
        } else {
            $hash_token = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $user_email, $selector, $hash_token, $expires);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connection);

        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "";
        $mail->Password = "";
        $mail->Port = 465; // 587
        $mail->SMTPSecure = "ssl"; // tls

        $email = "mybuddy@gmail.com";
        $name = "myBuddy";

        $subject = "Password Reset";
        $message = "<p>If you've lost your password or wish to reset it, use the link below to get started.</p>";
        $message .= "<a href=" . $url . ">" . $url . "</a>";
        $message .= "<p>If you did not request a password reset, you can safely ignore this email. Only a person with access to your email can reset your account password.</p>";

        // Email settings
        $mail->setFrom($email, $name);
        $mail->addAddress($user_email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        if ($mail->send()) {
            header("Location: " . ROOT_URL . "/index.php?reset=success");
        } else {
            header("Location: " . ROOT_URL . "/index.php?reset=failure");
        }
    } else {
        header("Location: " . ROOT_URL . "/index.php?error=ofsorts");
        exit();
    }