<?php
/**
 * The main template file
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
            <article>
                <?php if ( has_post_thumbnail() ) : ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php endif; ?>
                <h2><?php echo the_title(); ?></h2>
                <p><?php echo the_content(); ?></p>
            </article>
		<?php endwhile; ?>

	<?php else : ?>
		Nothing found.
	<?php endif; ?>

<?php get_footer(); ?>
