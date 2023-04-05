
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
                <div class="modal-body">
                    <!-- sign in with ulink -->
                    <!-- <div class="spacing-block padding-small"></div>
                    <div class="line-separator-wrapper">
                        <div class="line-divider"></div>
                        <div class="line-separator">OR</div>
                        <div class="line-divider"></div>
                    </div> -->
                    <form action="<?php echo ROOT_URL; ?>/users/sign_in.php" method="post">
                        <div class="form-group form-input-wrapper">
                            <div class="form-input">
                                <input type="text" name="email" placeholder="Email" autocomplete="off" required>
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
                            <button type="submit" name="login-submit" class="button-submit">Log in</button>
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
                                <input type="text" name="email" placeholder="Email" autocomplete="off" required>
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                            </div>    
                        </div>
                        <div class="form-group">
                            <button type="submit" name="join-submit" class="button-submit">Join</button>
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
                    <form action="<?php echo ROOT_URL; ?>/users/password/new.php" method="post">
                        <div class="form-group form-input-wrapper">
                            <div class="form-input">
                                <input type="text" name="email" placeholder="Email" autocomplete="off" required>
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
                        <div class="form-group">
                            <button type="submit" name="post-submit" class="button-submit">Post Your Question</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-size-small text-align-center">
                    <input type="checkbox" name="mailsend">
                    <p for="mailsend">send new responses to post via email?</p>
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
                                <input type="text" name="title" value="" autocomplete="off" required>
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                                <textarea name="content" oninput="auto_grow(this)" autocomplete="off" required>blah blah</textarea>
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
                    <form action="#" name="searchForm" onsubmit="addSearch()">
                        <div class="form-group form-input-wrapper">
                            <div class="form-input">
                                <input name="searchInput" type="text" placeholder="Search.." autocomplete="off">
                            </div>
                            <div class="line-divider"></div>
                            <div class="form-input">
                            </div>
                        </div>
                        <div class="form-group recent-search">
                            <div class="line-separator-wrapper">
                                <div class="line-divider"></div>
                                <h5 class="line-separator">Recents</h5>
                                <div class="line-divider"></div>
                            </div>
                            <div class="spacing-block padding-small"></div>
                            <div id="recent-status" class="text-size-xsmall text-align-center text-muted">No recent searches.</div>
                            <ul class="recent-list"></ul>
                            <button name="clearBtn" id="clear-search-btn" class="underline text-size-xsmall is-hidden" onclick="clearSearchHistory()">clear all</button>    
                        </div>
                        <div class="form-group">
                            <button type="submit" id="search-btn" class="button-submit">Search</button>
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
                    <div class="text-size-xsmall text-align-center text-muted">No new notifications.</div>
                    <ul class="notifications-list">
                        <li class="notification-item"></li>
                    </ul>
                    <!-- <button name="clearBtn" id="clear-search-btn" class="underline text-size-xsmall is-hidden" onclick="clearSearchHistory()">clear all</button>     -->
                </div>
                <div class="modal-footer text-size-small text-align-center">
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
                    <h1 class="modal-title text-align-center">Your Answer</h1>
                </div>
                <div class="spacing-block padding-small"></div>
                <div class="line-divider"></div>
                <div class="modal-body">
                    <form action="<?php echo ROOT_URL; ?>/post/answers/add_answer.php?post_id=<?php echo $post['id']; ?>" method="post">
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