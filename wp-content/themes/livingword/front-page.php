<?php
/**
 * The template for displaying the front page
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
    <div id="translation-toggler-container" class="full-height first-section valign without-header">
        <div id="translation-toggler" class="valign-center wrapper">
            <?php
                $homepage_translation_items = get_field('homepage_translation_items');
                $homepage_translation_infos = array();

                if(count($homepage_translation_items) > 2) {
                    $step_array = array();

                    foreach($homepage_translation_items as $i => $homepage_translation_item) {
                        $item = new stdClass();

                        // if($i == 0 || $i == 1) {
                        //     $item->title = wrap_letters($homepage_translation_item['translation_item_title']);
                        // }
                        // else {
                        //     $item->title = $homepage_translation_item['translation_item_title'];
                        // }

                        $item->title = $homepage_translation_item['translation_item_title'];
                        $item->content_title = $homepage_translation_item['translation_item_content_title'];
                        $item->content = $homepage_translation_item['translation_item_content'];
                        $item->language_name = $homepage_translation_item['translation_item_language_name'];
                        $item->text_alignment = $homepage_translation_item['translation_item_text_alignment'];

                        if($i % 2 == 0) {
                            array_push($step_array, $item);
                        }
                        else {
                            array_push($step_array, $item);
                            array_push($homepage_translation_infos, $step_array);

                            $step_array = array();
                        }
                    }
                }
            ?>
            <div class="half-width-col left">
                <div id="translation-item-left" class="translation-item">
                    <div class="translation-title subtitle"></div>
                    <div class="front">
                        <div class="translation-content">
                            <div class="border top"></div>
                            <div class="border top2 mobile"></div>
                            <div class="translation-inner-content copy"></div>
                            <div class="border bottom"></div>
                            <div class="border bottom2 mobile"></div>
                        </div>
                    </div>
                    <div class="back">
                        <div class="translation-content">
                            <div class="border top"></div>
                            <div class="border top2 mobile"></div>
                            <div class="translation-inner-content copy"></div>
                            <div class="border bottom"></div>
                            <div class="border bottom2 mobile"></div>
                        </div>
                    </div>
                </div>

                <ul id="translation-toggler-pager">
                    <?php
                        $pager_items_count = floor(count($homepage_translation_items) / 2);

                        for($j = 0; $j < $pager_items_count; $j ++) {
                            echo '<li></li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="half-width-col right">
                <div id="translation-item-right" class="translation-item">
                    <div class="translation-title subtitle"></div>
                    <div class="front">
                        <div class="translation-content clearfix">
                            <div class="border top"></div>
                            <div class="translation-inner-content copy"></div>
                            <div class="border bottom"></div>
                        </div>
                    </div>
                    <div class="back">
                        <div class="translation-content clearfix">
                            <div class="border top"></div>
                            <div class="translation-inner-content copy"></div>
                            <div class="border bottom"></div>
                        </div>
                    </div>
                    <div id="language-flag">
                        <div id="language-name-label" class="copy"></div>
                    </div>
                </div>
            </div>

            <div id="triangles-container">
                <div id="triangles">
                    <div class="circle"></div>
                    <div class="triangle triangle-left"></div>
                    <div class="triangle triangle-right"></div>
                    <div class="diamond"></div>
                </div>
            </div>
            <div id="spinner"></div>
            <!-- <div id="change-sentence">Change sentence</div> -->

            <div class="swipe left"></div>
            <div class="swipe right"></div>
            <script type="text/javascript">
                var translation_items = [];
            </script>
            <?php
                if(count($homepage_translation_items) > 2) {
                    echo '<script type="text/javascript">' . 'translation_items =' . json_encode($homepage_translation_infos) . ';' . '</script>';
                }
            ?>
        </div>

        <div id="learn-more" style="display:none;">
            <div class="wrapper small">
                <span class="left"><div class="arrow-down"></div>Scroll down to find out more</span>
            </div>
        </div>
    </div>

<!--
    <div id="first-vertical-line" class="vertical-line scroll-fade"></div>
    -->

    <section id="our-services" class="our-services-section">
        <div class="section">
            <h3 class="title scroll-anim type-anim ui" data-animation='{"animation": "type", "group": 1}'>
                <?php echo wrap_letters(get_field('our_services_title')); ?>
            </h3>
            <div class="title-line scroll-anim expand-anim fade" data-animation='{"animation": "expand", "delay": 0.5, "group": 1}'></div>

            <div id="services-container" class="wrapper ui scroll-fade white-bg">
                <?php
                    $services = get_field('services_list');
                    $services_list = array();

                    if(!empty($services)):
                ?>

                <!-- Mobile -->
                <div class="services-list mobile-only">
                <?php foreach(array_chunk($services, 2, true) as $services_group): ?>

                    <?php foreach($services_group as $index2 => $service): ?>
                        <div class="service-item<?php if($index2 % 2 == 0): ?> no-border<?php endif; ?>">
                            <p class="subtitle"><?php echo $service['service_name']; ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="services-row">
                    <?php foreach($services_group as $service): ?>
                        <div class="service-item-content-container">
                            <div class="service-item-content">
                                <h4 class="subtitle"><?php echo $service['service_description_title']; ?></h4>
                                <div class="service-description copy"><?php echo $service['service_description']; ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                </div>

                <!-- Tablet / Small desktop -->
                <div class="services-list tablet-desktop-small-only">
                <?php
                    $services_sub_arrays = array_chunk($services, 3, true);
                    $services_sub_arrays_count = count($services_sub_arrays);

                    foreach($services_sub_arrays as $services_sub_array_index => $services_group):
                ?>

                    <?php
                        foreach($services_group as $index2 => $service):
                            $service_item_classes = '';
                            if($index2 % 3 == 0) $service_item_classes .= ' no-border';
                            if(($services_sub_arrays_count - 1) == $services_sub_array_index) $service_item_classes .= ' no-line';
                    ?>
                        <div class="service-item<?php echo $service_item_classes; ?> scroll-anim fade slide-anim" data-animation='{"animation": "slide", "delay": <?php echo 0.75 + $index2 * 0.1; ?>, "group": 1}'>
                            <p class="subtitle"><?php echo $service['service_name']; ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="services-row">
                    <?php foreach($services_group as $service): ?>
                        <div class="service-item-content-container">
                            <div class="service-item-content">
                                <h4 class="subtitle"><?php echo $service['service_description_title']; ?></h4>
                                <div class="service-description copy"><?php echo $service['service_description']; ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                </div>

                <!-- Large desktop -->
                <div class="services-list desktop-large-only">
                <?php foreach(array_chunk($services, 4, true) as $services_group): ?>

                    <?php foreach($services_group as $index2 => $service): ?>
                        <div class="service-item<?php if($index2 % 4 == 0): ?> no-border<?php endif; ?> scroll-anim fade slide-anim" data-animation='{"animation": "slide", "delay": <?php echo 0.75 + $index2 * 0.1; ?>, "group": 1}'>
                            <p class="subtitle"><?php echo $service['service_name']; ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="services-row">
                    <?php foreach($services_group as $service): ?>
                        <div class="service-item-content-container">
                            <div class="service-item-content">
                                <h4 class="subtitle"><?php echo $service['service_description_title']; ?></h4>
                                <div class="service-description copy"><?php echo $service['service_description']; ?></div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                </div>

                <?php endif; ?>
            </div>
        </div>
    </section>

<!--
    <div class="vertical-line scroll-fade"></div>
-->
    <section id="our-languages" class="our-languages-section">
        <div class="section">
            <h3 class="title scroll-anim rotate-anim ui" data-animation='{"animation": "rotate", "group": 2}'>
                <?php echo wrap_letters(get_field('our_languages_main_heading')); ?>
            </h3>
            <div class="title-line scroll-anim expand-anim fade" data-animation='{"animation": "expand", "delay": 0.5, "group": 2}'></div>
            <div class="section-content copy ui white-bg">
                <h4 class="subtitle scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.75, "group": 2}'><?php echo get_field('our_languages_title'); ?></h4>
                <div class="strong scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.8, "group": 2}'><?php echo get_field('our_languages_subtitle'); ?></div>
                <div class="scroll-anim slide-anim fade" data-animation='{"animation": "slide", "duration": 0.8, "delay": 0.85, "group": 2}'><?php echo get_field('our_languages_description'); ?></div>
            </div>
        </div>
    </section>

<!--
    <div class="vertical-line scroll-fade"></div>
    -->

    <section id="who-we-work-with" class="we-work-for-section">
        <div class="section">
            <h3 class="title scroll-anim fade-anim ui" data-animation='{"animation": "fade", "duration": 2, "group": 3}'>
                <?php echo wrap_letters(get_field('who_we_work_with_title')); ?>
            </h3>
            <div class="title-line scroll-anim expand-anim fade" data-animation='{"animation": "expand", "delay": 0.5, "group": 3}'></div>

            <?php
                $agency_clients = get_field('agency_clients');

                if(!empty($agency_clients)):
            ?>
            <div class="wrapper">
                <ul id="agency-clients" class="clearfix ui white-bg">
                <?php
                    $logos_sets = array(1, 2);
                    $random_logo_set_name = 'set_' . $logos_sets[array_rand($logos_sets, 1)];

                    foreach($agency_clients as $index3 => $agency_client):
                        if($agency_client['client_logo_set'] == $random_logo_set_name):
                            $classes = ($agency_client['client_hover_text_size'] == 'one') ? ' one-block-width' : ' two-blocks-width';
                            $classes .= ($agency_client['client_hover_text_type'] == 'other') ? ' other' : ' testimonial';
                            $classes .= ($agency_client['client_hover_text_animation_direction'] == 'left') ? ' expand-left' : ' expand-right';

                            // $client_logo_svg_code = file_get_contents($agency_client['client_logo']['url']);
                            $pos = strpos($agency_client['client_logo']['url'], 'wp-content/');
                            $client_logo_svg_code = file_get_contents(wp_normalize_path($_SERVER["DOCUMENT_ROOT"] . '/' . substr($agency_client['client_logo']['url'], $pos)));
                ?>
                    <li class="agency-client scroll-anim fade scale-anim clip" data-animation='{"animation": "scale", "delay": <?php echo 0.3 + $index3 * 0.06; ?>, "group": 3}'>
                        <?php
                            if($client_logo_svg_code !== false) {
                                echo $client_logo_svg_code;
                            }
                        ?>
                        <?php
                            if(!empty($agency_client['client_hover_text'])):
                        ?>
                        <div class="hover-text copy<?php echo $classes; ?>">
                            <div class="hover-text-content">
                                <?php echo $agency_client['client_hover_text']; ?>
                                <span class="client-name"><?php echo $agency_client['client_name']; ?></span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </li>
                <?php
                        endif;
                    endforeach;
                ?>
                    <li class="clearfix"></li>
                </ul>
            </div>
            <?php
                endif;
            ?>
        </div>
    </section>

<!--
    <div class="vertical-line scroll-fade"></div>
    -->

    <section class="journal-section">
        <div class="section">
            <h3 class="title scroll-anim reveal-anim ui" data-animation='{"animation": "reveal", "group": 4}'>
                <?php echo wrap_letters(get_field('journal_title')); ?>
            </h3>
            <div class="title-line scroll-anim expand-anim fade" data-animation='{"animation": "expand", "delay": 0.5, "group": 4}'></div>
            <div id="journal-subtitle" class="copy ui scroll-anim fade slide-anim" data-animation='{"animation": "slide", "delay": 0.6, "group": 4}'><?php echo get_field('journal_subtitle'); ?></div>

            <?php
                $args = array (
                    'post_type'              => array( 'post' ),
                    'post_status'            => array( 'publish' ),
                    'posts_per_page'         => '3',
                    'order_by'               => 'date',
                    'order'                  => 'DESC'
                );

                // The Query
                $loop = new WP_Query( $args );
            ?>
            <div id="posts-list" class="ui white-bg">
                <?php
                    $post_index = 0;
                    while($loop->have_posts()): $loop->the_post();

                        $post_id = get_the_ID();

                        $categories = get_the_category();
                        $cat_name = $categories[0]->cat_name;
                        $excerpt = get_the_excerpt();

                        $has_thumbnail = has_post_thumbnail($post_id);
                ?>
                    <?php
                        set_query_var('post_index', $post_index);
                        set_query_var('post_id', $post_id);
                        set_query_var('has_thumbnail', $has_thumbnail);
                        set_query_var('cat_name', $cat_name);
                        set_query_var('excerpt', $excerpt);

                        get_template_part('content', 'homepage-post');

                        $post_index ++;
                    ?>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="wrapper">
                <a id="more-articles-link" class="strong scroll-anim fade slide-anim" href="<?php echo get_permalink(get_page_by_path('journal')); ?>" data-animation='{"animation": "slide", "delay": 1.45, "group": 4}'>View more articles.</a>
            </div>
        </div>
    </section>

<!--
    <div class="vertical-line scroll-fade margin"></div>
    -->

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
<!--
<script>
(function ($) {
    $(function () {
        var autoToggle = setInterval(function () {
            var idx = $('#translation-toggler-pager li.current').index() + 2;
            if (idx == 5) {
                idx = 1;
            }


            $('#translation-toggler-pager li:nth-child(' + idx + ')').trigger('click');
        }, 10000);


        $('#translation-toggler-pager').on('click', 'li', function (e) {
            if(e.which) {
                clearTimeout(autoToggle);
            }
        });
    });
})(jQuery);
</script>
-->
<?php get_footer(); ?>

