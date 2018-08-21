<?php
/**
 * The template for displaying the blog page
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part('sub-header'); ?>

        <?php
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array (
                'post_type'              => array( 'post' ),
                'post_status'            => array( 'publish' ),
                'paged'                  => $paged,
                'posts_per_page'         => '4',
                'order_by'               => 'date',
                'order'                  => 'DESC'
            );

            // The Query
            $loop = new WP_Query( $args );
        ?>
        <div id="posts-list" data-max-page="<?php echo $loop->max_num_pages; ?>">
            <?php

                while($loop->have_posts()): $loop->the_post();

                    $post_id = get_the_ID();

                    $categories = get_the_category();
                    $cat_name = $categories[0]->cat_name;
                    $excerpt = get_the_excerpt();

                    $has_thumbnail = has_post_thumbnail($post_id);
            ?>
                <?php
                    set_query_var('post_id', $post_id);
                    set_query_var('has_thumbnail', $has_thumbnail);
                    set_query_var('cat_name', $cat_name);
                    set_query_var('excerpt', $excerpt);

                    get_template_part('content', 'post');
                ?>

            <?php endwhile; ?>
            <div id="pagination">
            <?php
                echo next_posts_link( 'Older Entries', $loop->max_num_pages );
                echo previous_posts_link( 'Newer Entries' );
            ?>
            </div>
            <?php wp_reset_postdata(); ?>

        </div>

    <?php endwhile; ?>

<?php get_footer(); ?>