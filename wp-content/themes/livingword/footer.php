<?php
/**
 * The template for displaying the footer
 */
?>
    </div><!-- #main -->

    <?php wp_footer(); ?>

    <footer>
        <div id="infinite-scroll-footer">
            <div class="wrapper">
                <ul id="infinite-scroll-footer-contact-infos">
                    <li>E: <a href="mailto:<?php the_field('contact_email_address', 'option'); ?>?subject=Enquiry"><?php the_field('contact_email_address', 'option'); ?></a></li>
                    <li>T: <?php the_field('contact_phone_number', 'option'); ?></li>
                    <li>A: United Kingdom </li>
                    <li>S: livingword.ls </li>
                </ul>

                <div class="social-block">
                    <a class="facebook prevent" href="<?php echo get_field('contact_facebook_account_link', 'options'); ?>" target="_blank">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                            <path fill="#959595" d="M8 0c-4.418 0-8 3.582-8 8s3.582 8 8 8v-6h-2v-2h2v-1.5c0-1.381 1.119-2.5 2.5-2.5h2.5v2h-2.5c-0.276 0-0.5 0.224-0.5 0.5v1.5h2.75l-0.5 2h-2.25v5.748c3.45-0.888 6-4.020 6-7.748 0-4.418-3.582-8-8-8z"></path>
                        </svg>
                    </a>
                    <a class="twitter prevent" href="<?php echo get_field('contact_twitter_account_link', 'options'); ?>">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                            <path fill="#959595" d="M16 3.038c-0.589 0.261-1.221 0.438-1.885 0.517 0.678-0.406 1.198-1.050 1.443-1.816-0.634 0.376-1.337 0.649-2.085 0.797-0.599-0.638-1.452-1.037-2.396-1.037-1.813 0-3.283 1.47-3.283 3.282 0 0.257 0.029 0.508 0.085 0.748-2.728-0.137-5.147-1.444-6.766-3.43-0.283 0.485-0.444 1.049-0.444 1.65 0 1.139 0.579 2.144 1.46 2.732-0.538-0.017-1.044-0.165-1.487-0.411-0 0.014-0 0.027-0 0.041 0 1.59 1.132 2.917 2.633 3.219-0.275 0.075-0.565 0.115-0.865 0.115-0.212 0-0.417-0.021-0.618-0.059 0.418 1.304 1.63 2.253 3.066 2.28-1.123 0.88-2.539 1.405-4.077 1.405-0.265 0-0.526-0.016-0.783-0.046 1.453 0.931 3.178 1.475 5.032 1.475 6.038 0 9.34-5.002 9.34-9.34 0-0.142-0.003-0.284-0.010-0.425 0.642-0.463 1.198-1.041 1.638-1.699z"></path>
                        </svg>
                    </a>
                    <a class="linkedin prevent" href="<?php echo get_field('contact_linkedin_account_link', 'options'); ?>" target="_blank">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                            <path fill="#959595" d="M13.313 0h-10.625c-1.478 0-2.688 1.209-2.688 2.688v10.625c0 1.478 1.209 2.688 2.688 2.688h10.625c1.478 0 2.688-1.209 2.688-2.688v-10.625c0-1.478-1.209-2.688-2.688-2.688zM6 13h-2v-7h2v7zM5 5c-0.552 0-1-0.448-1-1s0.448-1 1-1 1 0.448 1 1-0.448 1-1 1zM13 13h-2v-4c0-0.552-0.448-1-1-1s-1 0.448-1 1v4h-2v-7h2v1.242c0.412-0.567 1.043-1.242 1.75-1.242 1.243 0 2.25 1.119 2.25 2.5v4.5z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div id="footer">
            <div id="get-in-touch-section" class="wrapper">
                <h3 class="title scroll-anim fade-anim" data-animation='{"animation": "fade", "group": 99}'>
                    <?php echo wrap_letters(get_field('footer_title', 'options')); ?>
                </h3>
                <div class="title-line scroll-anim expand-anim fade" data-animation='{"animation": "expand", "delay": 0.5, "group": 99}'></div>
                <a class="copy scroll-anim fade slide-anim" href="<?php echo get_permalink(get_page_by_path('contact')); ?>" data-animation='{"animation": "slide", "delay": 0.6, "group": 99}'>Our Contact Details</a>
            </div>

            <div class="wrapper">
                <div class="col copy scroll-anim fade slide-anim" data-animation='{"animation": "slide", "delay": 0.75, "group": 99}'>
                    <h3 class="strong">Address.</h3>
                    <a class="prevent" href="https://www.google.fr/maps/place/<?php echo urlencode(strip_tags(get_field('contact_address', 'options'))); ?>" target="_blank"><?php echo get_field('contact_address', 'options'); ?></a>
                </div>

                <div class="col copy scroll-anim fade slide-anim" data-animation='{"animation": "slide", "delay": 0.75, "group": 99}'>
                    <h3 class="strong">Let’s talk.</h3>
                    <p>
                        <?php
                            $contact_phone_number = get_field('contact_phone_number', 'options');
                            if(!empty($contact_phone_number)):
                        ?>
                        <?php echo $contact_phone_number; ?><br/>
                        <?php endif; ?>

                        <?php
                            $contact_email_address = get_field('contact_email_address', 'options');
                            if(!empty($contact_email_address)):
                        ?>
                        <a href="mailto:<?php echo $contact_email_address; ?>?subject=Enquiry"><?php echo $contact_email_address; ?></a>
                        <?php endif; ?>
                    </p>
                </div>

                <div class="col copy scroll-anim fade slide-anim" data-animation='{"animation": "slide", "delay": 0.75, "group": 99}'>
                    <h3 class="strong">New Business.</h3>
                    <p>
                        <?php
                            $contact_new_business_contact_name = get_field('contact_new_business_contact_name', 'options');
                            if(!empty($contact_new_business_contact_name)):
                        ?>
                            <?php echo $contact_new_business_contact_name; ?><br/>
                        <?php endif; ?>

                        <?php
                            $contact_new_business_email_address = get_field('contact_new_business_email_address', 'options');
                            if(!empty($contact_new_business_email_address)):
                        ?>
                            <a href="mailto:<?php echo $contact_new_business_email_address; ?>?subject=Enquiry"><?php echo $contact_new_business_email_address; ?></a>
                        <?php endif; ?>
                    </p>
                </div>

                <div class="col copy scroll-anim fade slide-anim" data-animation='{"animation": "slide", "delay": 0.75, "group": 99}'>
                    <h3 class="strong">Let's connect.</h3>
                    <ul class="social-links">
                        <?php
                            $contact_facebook_account_link = get_field('contact_facebook_account_link', 'options');
                            if(!empty($contact_facebook_account_link)):
                        ?>
                            <li class="social-link"><a class="social-icon facebook" href="<?php echo $contact_facebook_account_link; ?>"></a></li>
                        <?php endif; ?>

                        <?php
                            $contact_twitter_account_link = get_field('contact_twitter_account_link', 'options');
                            if(!empty($contact_twitter_account_link)):
                        ?>
                            <li class="social-link"><a class="social-icon twitter" href="<?php echo $contact_twitter_account_link; ?>"></a></li>
                        <?php endif; ?>

                        <?php
                            $contact_linkedin_account_link = get_field('contact_linkedin_account_link', 'options');
                            if(!empty($contact_linkedin_account_link)):
                        ?>
                            <li class="social-link"><a class="social-icon linkedin" href="<?php echo $contact_linkedin_account_link; ?>"></a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="sep"></div>

                <div class="clearfix">
                    <div id="copyright">©<?php echo date('Y'); ?> The Living Word Language Services Ltd. Registered in England and Wales. Company No. 05047863.</div>
                    <div id="rights"><a href="/privacypolicy" title="Privacy Policy">Privacy Policy</a></div>
                </div>
            </div>
        </div>
    </footer>
	<script type="text/javascript">
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

				   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

					m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

			})(window,document,'script','//www.google-analytics.com/analytics.js','__gaTracker');
			__gaTracker('create', 'UA-66682220-1', 'auto');
			__gaTracker('set', 'forceSSL', true);
			__gaTracker('send','pageview');
	</script>
</body>
</html>