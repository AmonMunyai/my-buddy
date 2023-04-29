
    <!-- modal login -->
    <div class="modal" id="modal-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Sign In</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="flash-msg"></div>
                <div class="modal-body">
                    <form action="<?php echo ROOT_URL; ?>/users/sign_in.php" method="post">
                        <div class="form-group form-input-wrapper">
                            <div class="form-input">
                                <input type="email" name="email" placeholder="Email" autocomplete="off" required>
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="spacing-block padding-xsmall"></div>
                        <p class="text-align-right text-size-xsmall">
                            <a href="#" onclick="toggleModal('forgot-password')">Forgot your password?</a>
                        </p>
                        <div class="form-group">
                            <button type="submit" name="login-submit" class="button-submit" onclick="handleModalErrors()">Log in</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-size-small text-align-center">
                    <a href="#" class="underline" onclick="toggleModal('join')">Sign up</a>
                    <span>if you don't have an account yet.</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- modal join -->
    <div class="modal" id="modal-join">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Create<br>Account</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <form action="<?php echo ROOT_URL; ?>/users/join.php" method="post">
                        <div class="form-group form-input-wrapper">
                            <div class="form-input">
                                <input type="text" name="firstname" placeholder="First name" autocomplete="off" required>
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <input type="text" name="lastname" placeholder="Surname" autocomplete="off" required>
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <input type="email" name="email" placeholder="Email" autocomplete="off" required>
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                            </div>    
                        </div>
                        <div class="form-group">
                            <button type="submit" name="join-submit" class="button-submit" onclick="handleModalErrors()">Join</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-size-small text-align-center">
                    <span>By creating an account, you agree to our</span>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- modal forgot password -->
    <div class="modal" id="modal-forgot-password">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Reset Password</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <form action="<?php echo ROOT_URL; ?>/users/password/forgot.php" method="post">
                        <div class="form-group form-input-wrapper">
                            <div class="form-input">
                                <input type="email" name="email" placeholder="Email" autocomplete="off" required>
                            </div>    
                        </div>
                        <div class="form-group">
                            <button type="submit" name="forgot-submit" class="button-submit">Forgot</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-size-small text-align-center">
                    <a href="#" onclick="toggleModal('login')">Back to Sign In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- modal create post -->
    <div class="modal" id="modal-create-post">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Ask a Buddy</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <form action="<?php echo ROOT_URL; ?>/post/create_post.php" method="post">
                        <div class="form-group form-input-wrapper">
                            <div class="form-input">
                                <input type="text" name="title" placeholder="Title" autocomplete="off" required>
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <textarea name="content" oninput="auto_grow(this)" placeholder="What's your question? Be specific.." autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="form-group text-size-small text-align-center">
                            <input type="checkbox" name="mailsend" value="1">
                            <label for="mailsend">send new responses to post via email?</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="post-submit" class="button-submit">Post Your Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal update post -->
    <div class="modal" id="modal-update-post">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Ask a Buddy (Update)</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <form action="<?php echo ROOT_URL; ?>/post/update_post.php?id=<?php echo $_GET['id'] ?? NULL; ?>" method="post">
                        <div class="form-group form-input-wrapper">
                            <div class="form-input">
                                <input type="text" name="title" autocomplete="off" required>
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <textarea name="content" oninput="auto_grow(this)" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="post-update-submit" class="button-submit">Update Question</button>
                            <div class="spacing-block padding-small"></div>
                            <button type="submit" name="post-delete-submit" class="button-submit">Delete Question</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-size-small text-align-center"></div>
            </div>
        </div>
    </div>

    <!-- modal search -->
    <div class="modal" id="modal-search">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Search</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <?php
                        if (isset($post)) {
                            echo '<form action="' . ROOT_URL . '/dashboard.php' . '" method="post">';
                        } else {
                            echo '<form>';
                        }
                    ?>
                        <div class="form-group form-input-wrapper">
                            <div class="form-input">
                                <input name="query" type="text" placeholder="Search.." autocomplete="off">
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                            </div>
                        </div>

                        <div class="spacing-block padding-medium"></div>
                        <div class="line-divider"></div>

                        <!-- <div class="form-group recent-search">
                            <div class="line-separator-wrapper">
                                <div class="line-divider"></div>
                                <h5 class="line-separator">Recents</h5>
                                <div class="line-divider"></div>
                            </div>
                            <div class="spacing-block padding-small"></div>
                            <div id="recent-status" class="text-size-xsmall text-align-center text-muted">No recent searches.</div>
                            <ul class="recent-list"></ul>
                            <button name="clear-btn" id="clear-search-btn" class="underline text-size-xsmall is-hidden" onclick="clearSearchHistory()">clear all</button>    
                        </div> -->
                        <div class="form-group">
                            <button type="submit" name="search-submit" id="search-btn" class="button-submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-size-small text-align-center">
                </div>
            </div>
        </div>
    </div>

    <!-- modal notifications -->
    <div class="modal" id="modal-notifications">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Notifications</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <div class="spacing-block padding-small"></div>
                    <ul class="notifications-list">
                        <?php
                            if (isset($_SESSION['user_id'])) {
                                $sql = "SELECT * FROM user_notification WHERE user_id=" . $_SESSION['user_id'];
                                $notifications = mysqli_query($connection, $sql);
        
                                if (mysqli_num_rows($notifications) > 0) {
                                    foreach ($notifications as $notification) {    
                        ?>
                        <li>
                            <a href="<?php echo $notification['user_notification_link']; ?>" class="notification-item">
                                <div class="notification-image profile-pic">
                                    <img src="<?php echo $notification['user_notification_image']; ?>" loading="lazy" alt>
                                </div>
                                <div class="notification-message">
                                    <span class="text-size-xsmall"><?php echo $notification['user_notification_message']; ?></span>
                                </div>
                            </a>
                        </li>
                        <?php
                                    }
                        ?>
                    </ul>
                </div>
                <div class="modal-footer text-size-small text-align-center">
                    <a href="<?php echo ROOT_URL; ?>/post/notification_clear.php" name="clear-btn" id="clear-search-btn" class="underline text-size-xsmall">clear all</a>
                        <?php
                                } else {
                        ?>
                    </ul>
                </div>
                <div class="modal-footer text-size-small text-align-center">
                    <div class="text-size-xsmall text-align-center text-muted">No new notifications.</div>
                        <?php
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>

    <!-- modal add answer -->
    <div class="modal" id="modal-add-answer">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Know The Answer?</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <?php
                        if (isset($post)) {
                            echo '<form action="' . ROOT_URL . '/post/answers/add_answer.php?post_id=' . $post['id'] . '" method="post">';
                        } else {
                            echo '<form>';
                        }
                    ?>
                        <div class="form-group form-input-wrapper">
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <textarea name="answer_content" oninput="auto_grow(this)" placeholder="Your Answer.." autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="answer-submit" class="button-submit" autocomplete="off">Post Your Answer</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-size-small text-align-center">
                    <p>By clicking, you agree to our <a href="#" class="underline">terms of service</a> and <a href="#" class="underline">privacy policy</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- modal add comment -->
    <div class="modal" id="modal-add-comment">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Any Suggestions</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <?php
                        if (isset($post)) {
                            echo '<form action="' . ROOT_URL . '/post/answers/add_comment.php?post_id=' . $post['id'] . '&post_answer_id=' . $post_answer['id'] . '" method="post">';
                        } else {
                            echo '<form>';
                        }
                    ?>
                        <div class="form-group form-input-wrapper">
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <textarea name="comment_content" oninput="auto_grow(this)" placeholder="Your Comment.." autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="comment-submit" class="button-submit" autocomplete="off">Comment</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-size-small text-align-center">
                    <p>By clicking, you agree to our <a href="#" class="underline">terms of service</a> and <a href="#" class="underline">privacy policy</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- modal profile -->
    <div class="modal" id="modal-profile">
        <div class="modal-dialog">
            <div class="modal-content">
                <button id="close-btn" class="close-icon" onclick="toggleModal('close')">+</button>
                <div class="modal-header">
                    <h1 class="modal-title text-align-center">Change<br>Profile Photo</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <form action="<?php echo ROOT_URL; ?>/users/update_avatar.php" method="post" enctype="multipart/form-data" id="profile">
                        <div class="form-group">
                            <input type="file" name="user_avatar" accept="image/jpeg,image/png"></input>
                            <input type="submit" name="upload-avatar-submit" id="upload-avatar-btn" class="button-submit" value="Upload Photo"></input>
                        </div>
                    </form>
                    <form action="<?php echo ROOT_URL; ?>/users/remove_avatar.php" method="post">
                        <div class="form-group">
                            <input type="submit" name="remove-avatar-submit" id="remove-avatar-btn" class="button-submit" value="Remove Current Photo"></input>
                        </div>
                    </form>
                </div>
                <div class="spacing-block padding-medium"></div>
            </div>
        </div>
    </div>
