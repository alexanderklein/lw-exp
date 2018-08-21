<?php
/**
 * The template for displaying Category pages
 */

get_header(); ?>

    <?php get_template_part('sub-header'); ?>

    <?php if ( have_posts() ) : ?>
        <div id="posts-list" data-max-page="<?php echo $wp_query->max_num_pages; ?>">
		<?php /* The loop */ ?>
        <?php
            while ( have_posts() ) : the_post();

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
                global $wp_query;
                echo next_posts_link( 'Older Entries', $wp_query->max_num_pages );
                echo previous_posts_link( 'Newer Entries' );
            ?>
            </div>
        </div>

	<?php else : ?>
        <div class="wrapper">Nothing found.</div>
	<?php endif; ?>

<?php get_footer(); ?>
