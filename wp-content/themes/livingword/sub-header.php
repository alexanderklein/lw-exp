<?php
    // Get current category. If we're not on a category page, it will be NULL
    $current_cat = get_the_category();
    if(!empty($current_cat)) $current_cat = $current_cat[0];
?>

<div id="categories-newsletter-container" class="light-grey-bg detached">
    <div class="form-bg no-mobile"></div>
    <div class="wrapper">
        <a id="show-categories" class="mobile-only black small" href="#">Show categories</a>
        <div id="categories-list">
            <div id="categories-list-content" class="expand-collapse-content small">
                <!-- <p id="choose-label">Choose:</p> -->
                <a <?php echo (empty($current_cat)) ? 'class="selected"' : ''; ?> href="<?php echo get_permalink(get_page_by_path('journal')); ?>">All</a>
                <?php
                    $all_categories = get_categories(
                        // Prevent 'Uncategorized' category to be shown
                        array(
                            'exclude' => '1'
                        )
                    );

                    foreach ($all_categories as $category):
                ?>
                    <a <?php echo (!empty($current_cat) && $current_cat->cat_ID == $category->cat_ID) ? 'class="selected"' : ''; ?> href="<?php echo get_category_link($category->cat_ID); ?>"><?php echo $category->cat_name; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <a id="newsletter-link" class="subscribe-link small" href="#">Subscribe <span class="no-mobile">to our newsletter!</span></a>
        <div id="newsletter-form-container" class="clearfix">
            <div class="expand-collapse-content newsletter-sub small">
                <?php echo do_shortcode('[contact-form-7 id="55" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</div>