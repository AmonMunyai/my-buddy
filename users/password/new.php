<?php

    $title= "myBuddy - Password Reset";
    $keywords = "";
    $description = "";
    require_once "../../core/init.php";
    require_once "../../shared/header.php";

?>
            <div class="navbar_buttons">
                <a href="#" id="login-btn" class="button" onclick="toggleModal('login')">Log in</a>
                <a href="#" id="join-btn" class="button" onclick="toggleModal('join')">Join</a>
            </div>
        </nav>
    </header>
<?php
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if (empty($selector) || empty($validator)) {
        echo "Could not validate request";
    } else {
        if ((ctype_xdigit($selector) !== false) && (ctype_xdigit($validator) !== false)) {
?>
        <!-- modal reset password -->
        <div class="modal is-active" id="modal-reset-password">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                    <div class="modal-header">
                        <h1 class="modal-title text-align-center">Reset Password</h1>
                    </div>
                    <div class="spacing-block padding-small"></div>
                    <div class="line-divider"></div>
                    <div class="modal-body">
                        <form action="<?php echo ROOT_URL; ?>/users/password/reset.php" method="post">
                            <div class="form-group form-input-wrapper">
                                <div class="form-input">
                                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                                </div>
                                <div class="form-input">
                                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                                </div>
                                <div class="form-input">
                                    <input type="password" name="password" placeholder="New password" autocomplete="off">
                                </div>
                                <div class="line-divider"></div>
                                <div class="form-input">
                                    <input type="password" name="password_confirm" placeholder="Confirm new password" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="reset-submit" class="button-submit">Reset Password</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer text-size-small text-align-center">
                        <a href="#" onclick="toggleModal('login')">Back to Sign In</a>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
    require_once "../../shared/modal.php";
?>