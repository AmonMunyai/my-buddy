<?php
    require_once "../core/init.php";

    if (isset($_GET['id'])) {
        $id = (string) $_GET['id'];


        $sql = "SELECT * FROM post WHERE id=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: " . ROOT_URL . "/dashboard.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $post = mysqli_fetch_assoc($result);

            if (!isset($post['id'])) {
                header("Location: " . ROOT_URL . "/dashboard.php");
                exit();
            }
        }
        mysqli_stmt_close($stmt);
    } else {
        header("Location: " . ROOT_URL . "/dashboard.php");
        exit();
    }

    $title= $post['post_title'] . " - myBuddy";
    $keywords = "";
    $description = "";
    require_once "../shared/header.php";
?>
            <div class="navbar_buttons">
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo '<a href="' . ROOT_URL . '/users/logout.php" id="logout-btn" class="button">Log out</a>';
                } else {
                    echo
                    '<a href="#" id="login-btn" class="button" onclick="toggleModal(' . "'login'" . ')">Log in</a>
                <a href="#" id="join-btn" class="button" onclick="toggleModal(' . "'join'" . ')">Join</a>
';
                }
                ?>
            </div>
        </nav>
    </header>

    <!-- main content -->
    <main class="main-wrapper">
        <section class="section_home">
            <div class="padding-global">
                <div class="container">
                    <?php require_once "../shared/navbar_left.php"?>

                    <!-- main content, question and answers -->
                    <div class="content">
                        <div class="question" id="question-<?php echo $post['id'];?>">
                            <div class="question-content">
                                <div class="question-content-header">
                                    <div class="question-content-title">
                                        <h3 class="text-color-white heading-style-h3"><?php echo $post['post_title']; ?></h3>
                                    </div>
                                    <div class="spacing-block padding-xsmall"></div>
                                    <div class="line-divider"></div>
                                </div>
                                <div class="spacing-block padding-small"></div>
                                <div class="question-content-body">
                                    <p><?php echo $post['post_content']; ?></p>
                                </div>
                                <div class="spacing-block padding-medium"></div>
                                <div class="question-content-footer">
                                    <?php
                                        if (isset($_SESSION['user_id']) && $_SESSION['user_username'] == $post['post_created_by']) {
                                            echo '<button id="add-comment-btn" class="button is-small" onclick="toggleModal(' . "'add-comment'" . ')">Add a comment</button>';
                                            echo '<button id="add-comment-btn" class="button is-small align-left" onclick="toggleModal(' . "'update-post'" . ')">Edit post</button>';                                            
                                        } else if (isset($_SESSION['user_id'])) {
                                            echo '<button id="add-comment-btn" class="button is-small" onclick="toggleModal(' . "'add-comment'" . ')">Add a comment</button>';
                                        } else {
                                            echo '<button id="add-comment-btn" class="button is-small" onclick="toggleModal(' . "'login'" . ')">Add a comment</button>';
                                        }
                                    ?>
                                    <div class="user-card">
                                        <div class="user-card-profile-pic">
                                            <?php $post_avatar = $post['post_created_by_avatar'] ?? ROOT_URL . "/public/assets/images/blank-profile-picture.png"; ?>
                                            <img src="<?php echo $post_avatar?>" loading="lazy" alt>
                                        </div>
                                        <div class="user-card-info">
                                            <div class="user-card-link">
                                                <h3 class="text-weight-bold"><a href="#" class="text-color-uj"><?php echo $post['post_created_by']; ?></a></h3>
                                            </div>
                                        </div>
                                        <time class="user-card-time">
                                            asked on
                                            <span class="relative-time text-color-uj"><?php echo $post['post_created_date']; ?></span>
                                        </time>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="spacing-block padding-medium"></div>
                        <div class="line-separator-wrapper">
                            <div class="line-divider"></div>
                            <h4 class="line-separator">Answers</h4>
                            <div class="line-divider"></div>
                        </div>
                        <div class="spacing-block padding-medium"></div>
                        
                        <?php
                            $post_id = $_GET['id'];

                            $sql = "SELECT * FROM post_answer WHERE post_id=$post_id ORDER BY post_answer_number_of_votes DESC";
                            $post_answers = mysqli_query($connection, $sql);

                            if (mysqli_num_rows($post_answers) == 0) {
                                echo '<p class="text-align-center text-muted text-size-small">0 answers</p>
                        <div class="spacing-block padding-medium"></div>
                        <div class="spacing-block padding-medium"></div>
';
                            } else { ?>
                            
                        <ul class="answers">
                            <?php foreach($post_answers as $post_answer) { ?>
                            <li class="answer">
                                <div class="answer-content">
                                    <div class="answer-content-header">
                                        <div class="user-card-info">
                                            <div class="user-card-profile-pic">
                                                <?php $post_answer_avatar = $post_answer['post_answer_created_by_avatar'] ?? ROOT_URL . "/public/assets/images/blank-profile-picture.png"; ?>
                                                <img src="<?php echo $post_answer_avatar ?>" loading="lazy" alt>
                                            </div>
                                            <div class="user-card-link">
                                                <h4 class="text-weight-bold"><a href="#" class="text-color-uj"><?php echo $post_answer['post_answer_created_by']?></a></h4>
                                            </div>
                                        </div>
                                        <div class="answer-vote">
                                            <?php
                                                if (!isset($_SESSION['user_id'])) {
                                                    $redirect = 'onclick="toggleModal(' . "'login'" . ')"';
                                                } else {
                                                    $redirect = 'href=' . ROOT_URL . '/post/answers/vote.php?id=' . $post_answer['id'] . '&post_id=' . $post_answer['post_id'];
                                                }

                                                $sql = "SELECT * FROM post_answer_vote WHERE post_id=" . $post_answer['id'];
                                                $post_answer_number_of_votes = mysqli_num_rows(mysqli_query($connection, $sql));
                                            ?>
                                            <a id="upvote-btn" <?php echo $redirect . "&vote=up"; ?> class="fa fa-arrow-up voting-button"></a>
                                            <div class="answer-score text-muted text-size-small"><?php echo $post_answer_number_of_votes?></div>
                                            <a id="downvote-btn" <?php echo $redirect . "&vote=down"; ?> class="fa fa-arrow-down voting-button"></a>
                                        </div>
                                    </div>
                                    <div class="spacing-block padding-small"></div>
                                    <div class="line-divider"></div>
                                    <div class="spacing-block padding-medium"></div>
                                    <div class="answer-content-body">
                                        <p><?php echo $post_answer['post_answer_content']; ?></p>
                                    </div>
                                    <div class="spacing-block padding-small"></div>
                                    <div class="answer-content-footer">
                                        <div class="user-card">
                                            answered on
                                            <time class="user-card-time text-muted">
                                                <span><?php echo $post_answer['post_answer_created_date']?></span>
                                            </time>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['user_id'])) {
                                            echo '<button id="add-comment-btn" class="button is-small">reply</button>';
                                        } else {
                                            echo '<button id="add-comment-btn" class="button is-small" onclick="toggleModal(' . "'login'" . ')">reply</button>';
                                        }
                                        ?>
                                        
                                    </div>
                                    <!-- <ul class="answer-content-comments text-size-xsmall">
                                        <li class="answer-comment">
                                            <div class="comment-vote">
                                                <button id=""><i class="fa fa-arrow-up"></i></button>
                                                <span class="comment-score">6</span>
                                                <button id=""><i class="fa fa-arrow-down"></i></button>
                                            </div>
                                            <div class="comment-text">
                                                <div class="comment-copy">
                                                    <span>Lorem ipsum dolor sit amet.</span>
                                                </div>  
                                                &bullet;
                                                <a href="#" class="comment-user text-color-uj">Lorem Ipsum</a>
                                                <div class="comment-date text-muted">
                                                    <span class="absolute-date">Mar 28, 2023</span> at <span class="absolute-time">12:22</span>
                                                </div>    
                                            </div>
                                        </li>
                                    </ul> -->
                                </div>
                            </li>
                            <?php }; ?>
                        </ul>
                        <?php }
                        ?>
                    </div>
            </div>
        </section>
    </main>

    <div class="spacing-block padding-large"></div>

<?php
    require_once "../shared/modal.php";
    require_once "../shared/footer.php";
?>