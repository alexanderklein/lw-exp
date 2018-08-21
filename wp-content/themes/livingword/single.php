<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part('sub-header'); ?>

    	<article>
            <?php
                // Heading image
                $heading_image = get_field('heading_image');
                $has_heading_image = false;

                if(!empty($heading_image)) {
                    $heading_image_url = $heading_image['url'];
                    $has_heading_image = true;
                }
            ?>
            <div class="post-single-header" <?php echo ($has_heading_image) ? 'style="background-image: url(' . $heading_image_url . ');"' : ''; ?>>
                <div class="wrapper">
                <?php
                    $categories = get_the_category();
                    $cat_name = $categories[0]->cat_name;
                    $cat_link = get_category_link($categories[0]->term_id);
                ?>
                    <p class="post-single-details small">
                        <a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
                        <span class="post-single-date"><?php the_date(); ?></span>
                    </p>
                    <h2 class="blog-post-title title"><?php the_title(); ?></h2>

                    <?php previous_post_link('%link', 'Previous post', TRUE); ?>
                    <?php next_post_link('%link', 'Next post', TRUE); ?>
                </div>
            </div>

            <?php
                // Author
                $author_id = get_the_author_meta('ID');
                $twitter_account_name = get_field('twitter_account_name', 'user_' . $author_id);
                $twitter_account_url = get_field('twitter_account_url', 'user_' . $author_id);

                // Add '@' character to twitter account name if it doesn't start with a '@' character
                if(0 !== strpos($twitter_account_name, '@')) {
                   $twitter_account_name = '@' . $twitter_account_name;
                }

                // Reading time
                $reading_time = get_field('reading_time', get_the_ID());
            ?>
            <div class="post-single-sub-header copy <?php echo($reading_time == '') ? 'no-reading-time' : ''; ?>">
                <div class="wrapper clearfix">
                    <div class="author-infos">
                        <div class="author-image"><?php echo get_wp_user_avatar($author_id, 50); ?></div>
                        <span class="author-name">By <?php the_author_meta('display_name'); ?></span>
                    </div>
                    <?php if(!empty($reading_time)): ?>
                        <span class="reading-time">This post is just: <span class="reading-time-duration"><?php echo $reading_time; ?> to read</span></span>
                    <?php else: ?>
                        <span class="reading-time"> </span>
                    <?php endif; ?>

                    <div class="share-block">
                        <span class="share-label">Share:</span>
                        <a class="share-link facebook prevent" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="10px" height="20px" viewBox="0 0 10 20" enable-background="new 0 0 10 20" xml:space="preserve">
                            <path d="M6.666,6.667V4.682c0-0.896,0.198-1.349,1.589-1.349H10V0H7.089C3.522,0,2.344,1.635,2.344,4.443v2.224H0V10h2.344v10h4.323
                                V10h2.938L10,6.667H6.666z"/>
                            </svg>
                        </a>
                        <a class="share-link twitter prevent" href="http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;hashtags=" target="_blank">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="20.348px" height="16.536px" viewBox="0.394 0.321 20.348 16.536" enable-background="new 0.394 0.321 20.348 16.536"
                                 xml:space="preserve">
                            <path d="M20.743,2.278c-0.749,0.332-1.553,0.556-2.398,0.658c0.862-0.517,1.524-1.335,1.836-2.309
                                c-0.807,0.478-1.7,0.826-2.651,1.013c-0.761-0.811-1.846-1.318-3.047-1.318c-2.306,0-4.175,1.87-4.175,4.174
                                c0,0.327,0.037,0.646,0.108,0.951C6.946,5.273,3.87,3.61,1.81,1.085C1.451,1.701,1.245,2.418,1.245,3.184
                                c0,1.448,0.737,2.726,1.857,3.474C2.419,6.637,1.775,6.449,1.212,6.136c0,0.017,0,0.035,0,0.053c0,2.023,1.439,3.71,3.349,4.093
                                c-0.35,0.095-0.72,0.146-1.1,0.146c-0.269,0-0.53-0.026-0.786-0.075c0.531,1.659,2.073,2.866,3.9,2.9
                                c-1.429,1.12-3.229,1.787-5.185,1.787c-0.337,0-0.669-0.02-0.995-0.059c1.847,1.184,4.041,1.875,6.399,1.875
                                c7.678,0,11.878-6.361,11.878-11.878c0-0.181-0.004-0.361-0.013-0.54C19.475,3.851,20.182,3.115,20.743,2.278z"/>
                            </svg>
                        </a>
                        <a class="share-link linkedin prevent" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=<?php the_excerpt(); ?>&amp;source=<?php the_permalink(); ?>" target="_blank">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="17.332px" height="17.301px" viewBox="10.658 10.639 17.332 17.301" enable-background="new 10.658 10.639 17.332 17.301"
                                 xml:space="preserve">
                                <g>
                                    <path d="M20.379,22.224c0-1.507,0.285-2.968,2.154-2.968c1.843,0,1.866,1.724,1.866,3.064v5.62h3.59v-6.338
                                        c0-3.112-0.671-5.504-4.308-5.504c-1.747,0-2.919,0.957-3.398,1.866h-0.049v-1.58H16.79v11.557h3.59L20.379,22.224L20.379,22.224z
                                        "/>
                                    <rect x="10.944" y="16.384" width="3.593" height="11.557"/>
                                    <path d="M12.74,14.805c1.148,0,2.082-0.933,2.082-2.082c0-1.15-0.934-2.084-2.082-2.084c-1.151,0-2.082,0.933-2.082,2.084
                                        C10.658,13.872,11.589,14.805,12.74,14.805z"/>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="blog-post-content wrapper">
                <div class="blog-post-inner-content copy">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>

        <?php
            $aside_posts = get_aside_posts();

            if(!empty($aside_posts)):
        ?>
        <aside>
            <div class="aside-posts-container wrapper">
                <h3 class="copy">We think you will like these as well.</h3>

                <ul class="aside-posts">
                <?php foreach ($aside_posts as $aside_post): ?>
                    <li>
                        <a href="<?php echo $aside_post->permalink; ?>">
                            <span class="aside-post-category small"><?php echo $aside_post->category; ?></span>
                            <span class="aside-post-date small"><?php echo $aside_post->date; ?></span>
                            <div class="sep"></div>
                            <h4 class="aside-post-title subtitle"><?php echo $aside_post->title; ?></h4>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </aside>
        <?php endif; ?>

	<?php endwhile; ?>

<?php get_footer(); ?>