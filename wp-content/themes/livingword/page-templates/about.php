<?php
/*
* Template Name: About
*/

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

    <div class="wrapper">
        <div class="section">
            <div class="first-section">
                <h2 class="title big scroll-anim type-anim ui" data-animation='{"animation": "type", "group": 1}'>
                    <span class="typing-title-label part-1" data-title="Our network is"><?php echo wrap_letters(get_field('professions_section_title_1')); ?></span>
                    <span class="typing-title-label part-2" data-title="our backbone_"><?php echo wrap_letters(get_field('professions_section_title_2')); ?></span>
                </h2>
                <div class="title-line scroll-anim expand-anim fade" data-animation='{"animation": "expand", "ease": "Back.easeOut", "delay": 0.5, "group": 1}'></div>
            </div>

            <img id="profession-flag" class="scroll-anim slide-anim fade" src="<?php echo get_template_directory_uri(); ?>/svg/flag.svg" alt="flag" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.75, "group": 1}'/>

            <?php
                $professions_list = get_field('professions_list');

                if(!empty($professions_list)):
            ?>
            <ul id="professions-list">
                <?php foreach($professions_list as $offset => $profession): ?>
                    <li class="subtitle scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": <?php echo 0.75 + $offset * 0.1; ?>, "group": 1}'><?php echo $profession['profession_name']; ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>

        <div class="vertical-line scroll-fade"></div>

        <section id="what-we-do" class="what-we-do-section">
            <div class="section">
                <h3 class="title scroll-anim rotate-anim ui" data-animation='{"animation": "rotate", "group": 2}'>
                    <?php echo wrap_letters(get_field('what_we_do_title')); ?>
                </h3>
                <div class="title-line scroll-anim expand-anim fade" data-animation='{"animation": "expand", "ease": "Back.easeOut", "delay": 0.5, "group": 2}'></div>
                <div class="section-content copy white-bg ui">
                    <h4 class="subtitle scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.75, "group": 2}'><?php echo get_field('what_we_do_subtitle'); ?></h4>
                    <div class="scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.8, "group": 2}'><?php echo get_field('what_we_do_description'); ?></div>
                </div>
            </div>
        </section>

        <div class="vertical-line scroll-fade"></div>

        <section id="how-we-do-it" class="how-we-do-it-section">
            <div class="section">
                <h3 class="title scroll-anim reveal-anim ui" data-animation='{"animation": "reveal", "group": 3}'>
                    <?php echo wrap_letters(get_field('how_we_do_it_title')); ?>
                </h3>
                <div class="title-line scroll-anim expand-anim fade" data-animation='{"animation": "expand", "ease": "Back.easeOut", "delay": 0.5, "group": 3}'></div>
                <div class="section-content copy scroll-fade white-bg ui">
                    <h4 class="subtitle scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.75, "group": 3}'><?php echo get_field('how_we_do_it_subtitle'); ?></h4>
                    <div class="scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.8, "group": 3}'><?php echo get_field('how_we_do_it_description'); ?></div>
                </div>
            </div>
        </section>

        <div class="vertical-line scroll-fade"></div>

        <section id="heading-up-the-team" class="the-team-section">
            <div class="section">
                <h3 class="title scroll-anim fade-anim ui" data-animation='{"animation": "fade", "duration": 2, "group": 4}'>
                    <?php echo wrap_letters(get_field('heading_up_the_team_title')); ?>
                </h3>
                <div class="title-line scroll-anim expand-anim fade" data-animation='{"animation": "expand", "ease": "Back.easeOut", "delay": 0.5, "group": 4}'></div>
                <div class="section-content copy scroll-fade white-bg ui">
                    <h4 class="subtitle scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.75, "group": 4}'><?php echo get_field('heading_up_the_team_subtitle'); ?></h4>
                    <div class="scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.8, "group": 4}'><?php echo get_field('heading_up_the_team_description'); ?></div>
                </div>

                <?php
                    // Get all users
                    $users = get_users(array('orderby' => 'id'));

                    // Get users custom fields values
                    foreach($users as $user) {
                        $user->infos = new stdClass();
                        $user->infos->name = get_the_author_meta('display_name', $user->ID);
                        $user->infos->avatar = get_wp_user_avatar($user->ID, 558);
                        $user->infos->user_email = get_the_author_meta('user_email', $user->ID);
                        $user->infos->user_job = get_field('user_job', 'user_' . $user->ID);
                        $user->infos->user_bio = get_the_author_meta('description', $user->ID);
                        $user->infos->user_favorite_untranslatable_word = get_field('user_favorite_untranslatable_word', 'user_' . $user->ID);
                        $user->infos->display_in_about_page = get_field('user_display_in_about_page', 'user_' . $user->ID);
                    }

                    // Remove users that shouldn't be displayed in the 'About Us' page
                    function filter_users($user) {
                        return ($user->infos->display_in_about_page == TRUE);
                    }
                    $users = array_filter($users, 'filter_users');
                ?>

                <?php if(!empty($users)): ?>
                    <ul id="team-members" class="clearfix white-bg ui">
                        <?php foreach($users as $user): ?>
                        <li class="boss clearfix">
                            <a class="user-infos copy" href="mailto:<?php echo $user->infos->user_email; ?>?subject=Enquiry">
                                <div class="user-avatar scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 1, "group": 5}'>
                                    <?php echo $user->infos->avatar; ?>
                                    <p class="copy">
                                        <span>
                                            <?php echo $user->infos->name; ?><br/>
                                            <span class="user-job"><?php echo $user->infos->user_job; ?></span>
                                        </span>
                                    </p>
                                </div>
                                <p class="user-email scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "group": 6}'><?php echo $user->infos->user_email; ?></p>
                            </a>
                            <div class="user-in-depth-infos">

                                <div class="user-subsection user-bio scroll-anim slide-anim fade" data-animation='{"animation": "slide", "delay": 0.5, "duration": 0.8, "group": 6}'>
                                    <h4 class="subtitle">Profile</h4>
                                    <div class="user-subsection-content copy">
                                        <p><?php echo $user->infos->user_bio; ?></p>
                                    </div>
                                </div>

                                <div style="display:none;" class="user-subsection scroll-anim slide-anim fade" data-animation='{"animation": "slide", "delay": 0.75, "duration": 0.8, "group": 6}'>
                                    <h4 class="subtitle">Favourite untranslatable word</h4>
                                    <div class="user-subsection-content copy">
                                        <?php echo $user->infos->user_favorite_untranslatable_word; ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <li class="clearfix"></li>
                    </ul>
                <?php endif; ?>
            </div>
        </section>

        <div class="vertical-line scroll-fade"></div>
    </div>

    <?php
        $min_ease = 0.1;
        $max_ease = 0.25;

        $languages_position = array(
            array(
                'label' => 'danish',
                'x' => 39.42,
                'y' => 2.88
            ),
            array(
                'label' => 'punjabi',
                'x' => 74.28,
                'y' => 3.82
            ),
            array(
                'label' => 'japanese',
                'x' => 18.42,
                'y' => 4.49
            ),
            array(
                'label' => 'greek',
                'x' => 12.71,
                'y' => 9.54
            ),
            array(
                'label' => 'hebrew',
                'x' => 58.5,
                'y' => 9.85
            ),
            array(
                'label' => 'chinese',
                'x' => 87.92,
                'y' => 10.29
            ),
            array(
                'label' => 'arabic',
                'x' => 23.5,
                'y' => 14.37
            ),
            array(
                'label' => 'russian',
                'x' => 63.92,
                'y' => 15.96
            ),
            array(
                'label' => 'korean',
                'x' => 70.92,
                'y' => 16.60
            ),
            array(
                'label' => 'mongolian',
                'x' => 11.92,
                'y' => 18.30
            ),
            array(
                'label' => 'hindi',
                'x' => 27.21,
                'y' => 18.33
            ),
            array(
                'label' => 'western',
                'x' => 48.07,
                'y' => 20.51
            ),
            array(
                'label' => 'german',
                'x' => 85.78,
                'y' => 22.35
            ),
            array(
                'label' => 'spanish',
                'x' => 11.28,
                'y' => 23.36
            ),
            array(
                'label' => 'malayalam',
                'x' => 71.14,
                'y' => 29.94
            ),
            array(
                'label' => 'turkish',
                'x' => 28.28,
                'y' => 34.41
            ),
            array(
                'label' => 'hindi',
                'x' => 65.78,
                'y' => 39.15
            ),
            array(
                'label' => 'western',
                'x' => 51.28,
                'y' => 40.74
            ),
            array(
                'label' => 'spanish',
                'x' => 11.57,
                'y' => 40.99
            ),
            array(
                'label' => 'turkish',
                'x' => 35.85,
                'y' => 48.08
            ),
            array(
                'label' => 'german',
                'x' => 95,
                'y' => 50
            ),
            array(
                'label' => 'arabic',
                'x' => 14.28,
                'y' => 51.84
            ),
            array(
                'label' => 'korean',
                'x' => 66.85,
                'y' => 54.52
            ),
            array(
                'label' => 'spanish',
                'x' => 30.85,
                'y' => 56.25
            ),
            array(
                'label' => 'hindi',
                'x' => 32.14,
                'y' => 64.54
            ),
            array(
                'label' => 'western',
                'x' => 64.42,
                'y' => 66.32
            ),
            array(
                'label' => 'russian',
                'x' => 18.71,
                'y' => 70.15
            ),
            array(
                'label' => 'malayalam',
                'x' => 85.71,
                'y' => 73.10
            ),
            array(
                'label' => 'turkish',
                'x' => 44.85,
                'y' => 74.22
            ),
            array(
                'label' => 'korean',
                'x' => 75.85,
                'y' => 78.27
            ),
            array(
                'label' => 'arabic',
                'x' => 14.14,
                'y' => 76.68
            ),
            array(
                'label' => 'japanese',
                'x' => 22,
                'y' => 80.86
            ),
            array(
                'label' => 'hindi',
                'x' => 58.28,
                'y' => 83.72
            ),
            array(
                'label' => 'german',
                'x' => 42,
                'y' => 89.35
            )
        );

        foreach($languages_position as $index => $language_position):
            $language_class = explode(' ', $language_position['label']);
            $language_class = $language_class[0];
            // $svg_letter = file_get_contents(get_template_directory_uri() . '/svg/language-icons/' . $language_class . '-icon.svg');
            $svg_letter = file_get_contents(wp_normalize_path($_SERVER["DOCUMENT_ROOT"] . '/wp-content/themes/livingword/svg/language-icons/' . $language_class . '-icon.svg'));

            if($svg_letter !== false):
                $label = $language_position['label'];
                $ease = round($min_ease + mt_rand() / mt_getrandmax() * ($max_ease - $min_ease), 2);
                $x = $language_position['x'];
                $y = $language_position['y'];
    ?>
    <div class="letter <?php echo $language_class; ?>" data-ease="<?php echo $ease; ?>" style="top: <?php echo $y; ?>%; left: <?php echo $x; ?>%;">
        <?php echo $svg_letter; ?>
        <p class="letter-language-name"><?php echo ucfirst($label); ?></p>
    </div>
    <?php
            endif;
        endforeach;
    ?>
    <?php endwhile; ?>

<?php get_footer(); ?>