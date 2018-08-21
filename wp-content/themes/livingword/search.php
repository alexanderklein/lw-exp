<?php
/**
 * The template for displaying Search Results pages
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( 'Search Results for: %s', get_search_query() ); ?></h1>
		</header>

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
                <h2><?php echo the_title(); ?></h2>
                <p><?php echo the_content(); ?></p>
            </article>
		<?php endwhile; ?>

	<?php else : ?>
		Nothing found.
	<?php endif; ?>

<?php get_footer(); ?>