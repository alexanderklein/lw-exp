<?php

add_theme_support( 'post-thumbnails' );

function livingword_scripts_styles() {
    if(!is_admin()) {

        wp_register_script('infinite_scroll',  get_template_directory_uri() . '/js/vendors/jquery.infinitescroll.min.js', array('jquery'), null, true);
        // wp_register_script('infinite_scroll',  get_template_directory_uri() . '/js/vendors/jquery.infinitescroll.js', array('jquery'), null, true);
        if( ! is_singular() || is_page('journal') ) {
            wp_enqueue_script('infinite_scroll');
        }

        wp_enqueue_script('livingword-script', get_template_directory_uri() . '/dist/js/main.min.js', array( 'jquery', 'underscore', 'backbone' ), '', true);
        wp_enqueue_style('livingword-style', get_stylesheet_uri(), array(), '');
    }
}
add_action( 'wp_enqueue_scripts', 'livingword_scripts_styles' );

// function livingword_register_post_types() {

// }
// add_action( 'init', 'livingword_register_post_types');

// function livingword_register_tanonomies() {

// }
// add_action( 'init', 'livingword_register_tanonomies');

function livingword_register_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Main menu' )
        )
    );
}
add_action( 'init', 'livingword_register_menus' );

// Body class
function livingword_body_class($classes) {
    if(is_page('journal')) $classes[] = 'page-blog';

    // Fixed header
    // if(is_front_page() || is_page('journal') || is_page('about') || is_single()) $classes[] = 'fixed-menu';
    if(!is_page('contact')) $classes[] = 'fixed-menu';

    // Black pages
    if(is_page('contact')) $classes[] = 'black';

    // No footer
    if(is_singular('post') || is_page('journal') || is_page('contact') || is_category()) $classes[] = 'no-footer';

    return $classes;
}
add_filter('body_class', 'livingword_body_class');

// Add css class to prev/next post links
function previous_post_link_attributes($html) {
    $html = str_replace('<a','<a class="previous-post-link prev-next-post-link prev small arrow"', $html);
    return $html;
}
function next_post_link_attributes($html) {
    $html = str_replace('<a','<a class="next-post-link prev-next-post-link next small arrow"', $html);
    return $html;
}
add_filter('next_post_link', 'next_post_link_attributes', 10, 1);
add_filter('previous_post_link', 'previous_post_link_attributes', 10, 1);


// Add css class to prev/next posts links
function previous_posts_link_attributes() {
    return 'class="previous-posts-link prev-next-posts-link"';
}
function next_posts_link_attributes() {
    return 'class="next-post-slink prev-next-posts-link"';
}
add_filter('next_posts_link_attributes', 'previous_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'next_posts_link_attributes');

// Create ACF option page(s)
if(function_exists('acf_add_options_page')) {
    acf_add_options_page();

    acf_add_options_sub_page('Contact infos');
}

function get_random_posts() {
    // set arguments for get_posts()
    $args = array(
        'numberposts' => 2,
        'orderby' => 'rand'
    );

    // get a random post from the database
    $random_posts = get_posts($args);

    return $random_posts;
}
function get_aside_posts() {
    $aside_posts = array();
    $random_posts = get_random_posts();

    foreach($random_posts as $random_post) {
        if(isset($random_post)) {
            $post_id = $random_post->ID;
            $categories = get_the_category($post_id);
            $cat_name = $categories[0]->name;

            $aside_post = new stdClass();
            $aside_post->title = $random_post->post_title;
            $aside_post->category = $cat_name;
            $aside_post->date = get_the_time('F j, Y', $post_id);
            $aside_post->permalink = get_permalink($post_id);

            array_push($aside_posts, $aside_post);
        }
    }

    return $aside_posts;
}

function get_ellipsis_content($content, $max_characters_count, $read_more_str = '...') {
    return wp_html_excerpt($content, $max_characters_count, $read_more_str);
}
function get_front_page_excerpt($limit, $post_object) {
    // Limit to a certain amount of words
    // $content_str = (get_the_content() != '') ? get_the_content() : $post_object->post_content;
    // $content = explode(' ', $content_str, $limit);

    // if(count($content) >= $limit) {
    //     array_pop($content);
    //     $content = implode(' ', $content) . '...';
    // }
    // else {
    //     $content = implode(' ', $content);
    // }

    // $content = preg_replace('/\[.+\]/','', $content);
    // $content = apply_filters('the_content', $content);
    // $content = str_replace(']]>', ']]&gt;', $content);
    // $content = strip_tags($content, '<br><br/><p></p>');

    // return $content;


    $original_content = (get_the_content() != '') ? get_the_content() : $post_object->post_content;
    $excerpt = preg_replace(" (\[.*?\])", '', $original_content);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));

    $excerpt = $excerpt . '...';

    return $excerpt;
}

/**
 * Page transition
 */
function get_transition_text() {
    $languages_names = array(
        'english',
        'spanish',
        'chinese',
        'french'
    );
    $languages_texts = array(
        'There is no word in the English language that rhymes with month, orange, silver or purple.',
        'THE UNITED STATES has almost 40 million native Spanish speakers.',
        'There are over 100,000 Chinese characters recorded in the most advanced Mandarin Chinese dictionaries.',
        'At the time of the French Revolution, 75% of French citizens didn’t speak French as a mother tongue.'
    );

    $random_index = mt_rand(0, count($languages_names) - 1);

    $transition_text = new stdClass();
    $transition_text->language_name = get_language_name($languages_names[$random_index]);
    $transition_text->language_text = $languages_texts[$random_index];

    return $transition_text;
}
function get_language_name($name) {
    $language_name = '';
    $name = str_split($name);

    for($i = 0, $length = count($name); $i < $length; $i ++) {
        $language_name .= '<div class="loading-word-part">' . $name[$i] . '</div>';
    }

    return $language_name;
}


function should_show_splashscreen() {
    return !isset($_COOKIE['lw_splashscreen_cookie']);
}
function set_splashscreen_cookie() {
    if(!isset($_COOKIE['lw_splashscreen_cookie'])) {
        setcookie('lw_splashscreen_cookie', 1, 0, COOKIEPATH, COOKIE_DOMAIN, false);
    }
}
add_action('init', 'set_splashscreen_cookie', 1);


/**
 * ACF
 */
// Allow svg to be uploaded in wordpress media gallery
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Infinite Scroll
 */
function custom_infinite_scroll_js() {
    if( ! is_singular() || is_page('journal') ) { ?>
    <script>
    var infinite_scroll = {
        loading: {
            img: '',
            msgText: '<?php echo 'Loading...'; ?>',
            finishedMsg: '<?php echo 'All posts loaded.'; ?>'
        },
        nextSelector: '#pagination .previous-posts-link',
        navSelector: '#pagination',
        itemSelector: '.post',
        contentSelector: '#posts-list',
        debug: false,
        maxPage: jQuery('#posts-list').attr('data-max-page')
    };
    jQuery('#pagination').css('opacity', 0);
    jQuery( infinite_scroll.contentSelector ).infinitescroll(
        infinite_scroll,
        function(newElements) {
            if(newElements.length) {
                for(var i = 0, length = newElements.length; i < length; i ++) {
                    var $el = jQuery(newElements[i]);
                    $el.addClass('fade-in');
                }
            }
        }
    );
    </script>
    <?php
    }
}
add_action( 'wp_footer', 'custom_infinite_scroll_js', 100 );

// Load custom styles stylesheet for TinyMCE
function livingword_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action('admin_init', 'livingword_theme_add_editor_styles');

function fb_mce_editor_buttons( $buttons ) {

    // Enable 'styleselect' dropdown for TinyMCE
    array_unshift( $buttons, 'styleselect' );

    // Remove 'formatselect' from TinyMCE
    $value = array_search( 'formatselect', $buttons );
    if(FALSE !== $value) {
        foreach($buttons as $key => $value) {
            if('formatselect' === $value) unset($buttons[$key]);
        }
    }

    return $buttons;
}
add_filter('mce_buttons_2', 'fb_mce_editor_buttons');

// Add styles to TinyMCE "Styles" drop-down
function fb_mce_before_init($settings) {

    $style_formats = array(
        array(
            'title' => 'Main heading',
            'inline' => 'span',
            'classes' => 'title'
        ),
        array(
            'title' => 'Subheading',
            'inline' => 'span',
            'classes' => 'subtitle'
        ),
        array(
            'title' => 'Copy',
            'inline' => 'span',
            'classes' => 'copy'
        ),
        array(
            'title' => 'Small caption',
            'inline' => 'span',
            'classes' => 'small'
        )
    );

    $settings['style_formats'] = json_encode($style_formats);

    return $settings;
}
add_filter('tiny_mce_before_init', 'fb_mce_before_init');

// Replace all spaces by '&nbsp;' and wrap each character in <span> tag
function wrap_letters($label) {
    return preg_replace('/ /i', '&nbsp;', '<span>' . implode('</span><span>', str_split($label)) . '</span>');
}

add_filter('acf/settings/remove_wp_meta_box', '__return_false');