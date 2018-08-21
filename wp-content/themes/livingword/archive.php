<?php
/**
 * The template for displaying Archive pages
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h1 class="archive-title"><?php
				if ( is_day() ) :
					printf( 'Daily Archives: %s', get_the_date() );
				elseif ( is_month() ) :
					printf( 'Monthly Archives: %s', get_the_date( _x( 'F Y', 'monthly archives date format', 'twentythirteen' ) ) );
				elseif ( is_year() ) :
					printf( 'Yearly Archives: %s', get_the_date( _x( 'Y', 'yearly archives date format', 'twentythirteen' ) ) );
				else :
					_e( 'Archives', 'twentythirteen' );
				endif;
			?></h1>
		</header><!-- .archive-header -->

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
