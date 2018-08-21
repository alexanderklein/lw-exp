<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="post-item <?php echo ($has_thumbnail) ? 'has-thumbnail' : ''; ?>" href="<?php the_permalink(); ?>">
        <div class="wrapper clearfix">
            <div class="post-infos">
                <span class="post-category small"><span><?php echo $cat_name; ?></span></span>
                <span class="post-date small"><?php echo get_the_date('M j, Y', $post_id); ?></span>
            </div>
            <div class="post-content">
                <div class="post-title subtitle"><?php the_title(); ?></div>

                <?php if($excerpt != ''): ?>
                <!-- <div class="post-excerpt copy"><?php echo get_ellipsis_content(get_the_excerpt(), 430); ?></div> -->
                <div class="post-excerpt copy"><?php echo get_front_page_excerpt(300, get_the_excerpt()); ?></div>
                <?php endif; ?>
            </div>

            <?php if(has_post_thumbnail($post_id)): ?>
            <div class="post-thumbnail">
                <?php echo get_the_post_thumbnail($post_id, 'full'); ?>
            </div>
            <?php endif; ?>
        </div>
    </a>
</article>