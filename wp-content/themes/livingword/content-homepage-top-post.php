<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="post-item homepage-post<?php echo ($has_thumbnail && $post_index == 0) ? ' has-thumbnail' : ''; ?><?php echo ($post_index > 0) ? ' small' : ''; ?> " href="<?php the_permalink(); ?>" data-animation='{"animation": "slide", "delay": <?php echo 1 + $post_index * 0.15; ?>, "group": 4}'>
    <!-- scroll-anim fade slide-anim -->
        <div class="wrapper clearfix top-posts">
            <div class="post-infos">
                <?php if($has_thumbnail && $post_index == 0) {?>
                <p class="posts-headline">Our latest Journal posts.</p>
                <?php } ?>
                <span class="post-category small"><span><?php echo $cat_name; ?></span></span>
                <span class="post-date small"><?php echo get_the_date('M j, Y', $post_id); ?></span>
            </div>
            <div class="post-content">
                <div class="post-title subtitle"><?php the_title(); ?></div>

                <?php if($post_index == 0): ?>
                    <?php if($excerpt != ''): ?>
                    <!-- <div class="post-excerpt copy"><?php echo get_ellipsis_content(get_the_excerpt(), 380); ?></div> -->
                    <div class="post-excerpt copy"><?php echo get_front_page_excerpt(300, get_the_excerpt()); ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if($post_index == 0): ?>
                <?php if(has_post_thumbnail($post_id)): ?>
                <div class="post-thumbnail">
                    <?php echo get_the_post_thumbnail($post_id, 'full'); ?>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </a>
</article>