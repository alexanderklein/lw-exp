<?php
/*
* Template Name: Trans
*/

get_header();


?>

<style type="text/css">
#footer #get-in-touch-section a {opacity:1;}
</style>

    <?php while ( have_posts() ) : the_post(); ?>


		<?php

		global $post;
		$slug = get_post()->post_name;

		?>

        <div class="transmain">

			<h3 class="title"><?php echo get_field('trans_title'); ?></h3>
            <div class="title-line"></div>
            <div class="t_subtitle"><?php echo get_field('trans_sub'); ?></div>
            <div class="t_desc"><?php echo get_field('trans_desc'); ?></div>
            <div class="t_content"><?php echo get_field('trans_content'); ?></div>

			<div class="translinks">
				<div style="border-top:1px solid #ccc;text-align:center;padding:10px 0 10px 0;"></div>
				<ul class="transmenu">
				<?php if($slug!="translation") echo '<li><a href="/translation" title="Translation Services">Translation</a></li>'; ?>
				<?php if($slug!="adaptation") echo '<li><a href="/adaptation" title="Adaptation Services">Adaptation</a></li>'; ?>
				<?php if($slug!="proofreading") echo '<li><a href="/proofreading" title="Proofreading Services">Proofreading</a></li>'; ?>
				<?php if($slug!="typesetting") echo '<li><a href="/typesetting" title="Typesetting Services">Typesetting</a></li>'; ?>
				<?php if($slug!="transcription") echo '<li><a href="/transcription" title="Transcription Services">Transcription</a></li>'; ?>
				<?php if($slug!="transcreation") echo '<li><a href="/transcreation" title="Transcreation Services">Transcreation</a></li>'; ?>
				<?php if($slug!="interpreting") echo '<li><a href="/interpreting" title="Interpreting Services">Interpreting</a></li>'; ?>
				<?php if($slug!="subtitling") echo '<li><a href="/subtitling" title="Subtitling Services">Subtitling</a></li>'; ?>
				</ul>
				<div style="clear:left;"></div>
				<div style="border-bottom:1px solid #ccc;text-align:center;padding:10px 0 10px 0;"></div>
			</div>
			<div style="margin:0 0 160px 0;"></div>
		</div>


	<?php endwhile; ?>

<?php get_footer('trans'); ?>