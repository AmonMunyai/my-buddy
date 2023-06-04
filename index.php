<?php
    $title= "myBuddy - Your Ultimate Guide to Varsity Life";
    $keywords = "";
    $description = "";
    require_once "./core/init.php";
    require_once "./shared/header.php";
?>
    <!-- main component -->
    <main class="main-wrapper">
        <!-- section header -->
        <section class="section_header">
            <div class="header_viewport-80">
                <div class="padding-global">
                    <div class="container-medium">
                        <div class="padding-section-medium">
                            <div class="text-align-center">
                                <h1 class="text-color-white heading-style-h1">
                                    <span class="text-color-uj">Your Ultimate Guide</span>
                                    <br>
                                    to Varsity Life
                                </h1>
                                <div class="spacing-block padding-small-plus"></div>
                                <p class="text-size-large">
                                    Your one-stop solution to ace student life, get ahead with course material, and build a thriving campus social life.
                                </p>
                                <div class="spacing-block padding-medium"></div>
                                <div class="button-group">
                                    <a href="#" id="get_started-btn" class="button is-large" onclick="toggleModal('join')">Get Started</a>
                                    <p id="registration-msg" class="text-align-left text-size-small is-hidden">
                                        You must be a registered UJ
                                        <br>
                                        student in order to sign up.
                                    </p>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </section>

        <!-- section overview -->
        <section class="section_overview">
            <div class="padding-global">
                <div class="container-large">
                    <div class="padding-section-medium is-padding-bottom-only">
                        <div class="panels_2-column">
                            <div class="panel_item">
                                <div class="panel_item-content">
                                    <div class="icon-tile"></div>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <h2 class="heading-style-h4">Sharpen your knowledge</h2>
                                    <div class="spacing-block padding-small"></div>
                                    <p class="text-size-medium">Challenge yourself on small exercises crafted by other students to help you improve your grades.</p>
                                    <div class="spacing-block padding-small-plus"></div>
                                </div>
                                <div class="panel_item-image-wrapper"></div>
                            </div>
                            <div class="panel_item">
                                <div class="panel_item-content">
                                    <div class="icon-tile"></div>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <h2 class="heading-style-h4">Get instant feedback</h2>
                                     <div class="spacing-block padding-small"></div>
                                    <p class="text-size-medium">Students can ask and answer questions about their university. Anything from academics, campus life, or extracurricular activities.</p>
                                </div>
                                <div class="panel_item-image-wrapper"></div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </section>

        <!-- section_community -->
        <section class="section_community">
            <div class="padding-global">
                <div class="container-small-plus">
                    <div class="padding-section-small is-padding-bottom-only">
                        <div class="text-align-center">
                            <h2 class="heading-style-h2">An engaged student community</h2>
                            <div class="spacing-block padding-small-plus"></div>
                            <p class="text-size-large">
                                myBuddy is a collective effort by its users. They are creators-authoring posts to teach various techniques, and solutions that enlighten others, and commenting with constructive feedback.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container-large">
                    <div class="padding-section-medium is-padding-bottom-only">
                        <div class="panel-column">
                            <div class="panel_item is-3-column is-uj text-align-center">
                                <div class="panel_item-content">
                                    <p class="heading-style-h1">50K+</p>
                                    <div class="spacing-block padding-small"></div>
                                    <p>Daily active users</p>
                                </div>
                                <div class="panel_item-content">
                                    <p class="heading-style-h1">275K+</p>
                                    <div class="spacing-block padding-small"></div>
                                    <p>Exercises completed every month</p>
                                </div>
                                <div class="panel_item-content">
                                    <p class="heading-style-h1">780K+</p>
                                    <div class="spacing-block padding-small"></div>
                                    <p>Posts and comments</p>
                                </div>
                            </div>
                        </div>
                        <div class="spacing-block padding-medium"></div>                   
                        <div class="panels_2-column">
                            <div class="panel_item">
                                <div class="panel_item-content">
                                    <div class="icon-tile"></div>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <h2 class="heading-style-h4">Tap into the collective wisdom</h2>
                                    <div class="spacing-block padding-small"></div>
                                    <p class="text-size-medium">Compare your knowledge with others after studying, for greater understanding. Discuss exercises, assignments, best practices, and innovative techniques with the community.</p>
                                </div>
                            </div>
                            <div class="panel_item">
                                <div class="panel_item-content">
                                    <div class="icon-tile"></div>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <h2 class="heading-style-h4">Create your own exercises</h2>
                                    <div class="spacing-block padding-small"></div>
                                    <p class="text-size-medium">Create exercise related to your course, or exercises that help you study for exams. Other students can then take these exercises and offer feedback, creating a collaborative learning enviroment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- section faq -->
        <section class="section_faq">
            <div class="padding-global">
                <div class="container-small">
                    <div class="padding-section-small is-padding-bottom-only">
                        <div class="text-align-center">
                            <h2 class="heading-style-h2">What can I use myBuddy for?</h2>
                            <div class="spacing-block padding-small-plus"></div>
                            <p class="text-size-large">From personalized course material to on-campus updates, we've got you covered!</p>
                        </div>
                    </div>
                </div>
                <div class="container-large">
                    <div class="padding-section-medium is-padding-bottom-only">
                        <div class="panels_3-column">
                            <div class="panel_item">
                                <div class="panel_item-content">
                                    <div class="icon-tile"></div>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <h2 class="heading-style-h4">Get new perspectives</h2>
                                    <div class="spacing-block padding-small"></div>
                                    <p class="text-size-medium">Pickup new techniques from some of the most smartest students on campus.</p>
                                </div>
                            </div>
                            <div class="panel_item">
                                <div class="panel_item-content">
                                    <div class="icon-tile"></div>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <h2 class="heading-style-h4">Get campus updates</h2>
                                    <div class="spacing-block padding-small"></div>
                                    <p class="text-size-medium">Keep up to date with the latest updates from UJ. Including stories from our users.</p>
                                </div>
                            </div>
                            <div class="panel_item">
                                <div class="panel_item-content">
                                    <div class="icon-tile"></div>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <h2 class="heading-style-h4">Compete with peers</h2>
                                    <div class="spacing-block padding-small"></div>
                                    <p class="text-size-medium">Compete against your friends, and the community at large. Allow competition to motivate you towards mastering your craft.</p>
                                </div>
                            </div>
                        </div>
                        <div class="spacing-block padding-small-plus"></div>
                        <div class="panels_2-column">
                            <div class="panel_item">
                                <div class="panel_item-content">
                                    <div class="icon-tile"></div>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <h2 class="heading-style-h4">Build self-confidence</h2>
                                    <div class="spacing-block padding-small"></div>
                                    <p class="text-size-medium">Not sure if you are progressing well as a student? Push yourself to your limits and show yourself what you are really made of.</p>
                                </div>
                            </div>
                            <div class="panel_item">
                                <div class="panel_item-content">
                                    <div class="icon-tile"></div>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <h2 class="heading-style-h4">Become a mentor</h2>
                                    <div class="spacing-block padding-small"></div>
                                    <p class="text-size-medium">Lend your expertise to others, either directly by engaging with other students or indirectly by creating your own exercises.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- section latest -->
        <section class="section_latest">
            <div class="padding-global">
                <div class="container-small">
                    <div class="padding-section-small is-padding-bottom-only">
                        <div class="text-align-center">
                            <h2 class="heading-style-h2">The Developers</h2>
                            <div class="spacing-block padding-small-plus"></div>
                            <p class="text-size-large">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit temporibus saepe numquam.</p>        
                        </div>
                    </div>
                </div>
                <div class="container-large">
                    <div class="padding-section-medium is-padding-bottom-only">
                    <div class="blog_item">
                        <div class="blog_item-featured">
                            <a href="#" class="blog_image-wrapper inline-block">
                                <img src="public/assets/images/TA-MUNYAI.jpg" class="blog_image" loading="lazy" alt>
                            </a>
                            <div class="blog_item-content">
                                <div class="blog_item-content-top">
                                    <a href="#" class="inline-block text-color-white">
                                        <h3 class="heading-style-h3">Front-End and Back-End Development</h3>
                                        <div class="spacing-block padding-small"></div>
                                        <p class="text-size-medium">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, nam, minima numquam esse harum consectetur laudantium maxime tempore enim, dolorum voluptate beatae aut nesciunt accusamus!</p>        
                                    </a>
                                    <div class="spacing-block padding-small-plus"></div>
                                </div>
                                <div class="blog_author-wrapper">
                                    &bull;
                                    <div class="blog_author-text">
                                        <div class="text-weight-bold">TA MUNYAI</div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="spacing-block padding-small-plus"></div>
                    <div class="actions">
                        <a href="developers.php" style="justify-content: center; display: flex;" class="button is-large">See All</a>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- section uj -->
        <section class="section_uj">
            <div class="padding-global">
                <div class="container-large">
                    <div class="padding-section-medium is-padding-bottom-only">
                        <div class="panel_item is-uj">
                            <div class="panel_item-content">
                                <div class="text-align-center max-width-large align-center">
                                    <h6 class="heading-style-h6">myBuddy IS POWERED BY</h6>
                                    <div class="spacing-block"></div>
                                    <img src="./public/assets/images/university-of-johannesburg-logo.png" loading="lazy" height="125" alt="university-of-johannesburg-logo">
                                    <div class="spacing"></div>
                                    <p class="text-size-medium">The country's second strongest brand, offering world-class, academic programmes designed to prepare students for the world.</p>
                                    <div class="spacing-block padding-small-plus"></div>
                                    <a href="https://www.uj.ac.za/" target="_blank" id="learn_more-btn" class="button is-large">Learn more</a>
                                    <div class="spacing-block padding-small"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
    require_once "./shared/modal.php";
    require_once "./shared/footer.php";
    require_once "./shared/error.php";
?>