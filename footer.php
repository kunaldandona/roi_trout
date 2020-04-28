<!--
 * This Divi child theme file modifies Divi Theme v2.3.1 footer links starting at line 45 below.
 * Author:   David Tierney http://designsbytierney.com
 * Creation date March 5, 2015
-->

    <?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix">
                        <div class="footer-wrap">
                            <div class="footer-col">
                                <div class="footer-sec-logo">
                                    <img class="footer-logo" src='<?= get_stylesheet_directory_uri() . '/assets/bg-logo.jpg' ?>' alt="">
                                    <img class="footer-logo" src='<?= get_stylesheet_directory_uri() . '/assets/chba-logo.jpg' ?>' alt="">
                                    <img class="footer-logo" src='<?= get_stylesheet_directory_uri() . '/assets/bc-wood.jpg' ?>' alt="">
                                </div>

                                <p><?= get_field('footer_description', 'option'); ?></p>
                                <?php
                                if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
                                    get_template_part( 'includes/social_icons', 'footer' );
                                }
                                ?>

                            </div>
                            <div class="footer-col">
                                <div class="footer-network-links">
                                    <h2>Trout Creek For</h2>
                                    <ul>
                                        <?php global $troutnetwork, $current;
                                        $current = get_current_blog_id();
                                        $logoImg = $template_directory_uri . '/assets/trout-creek-logo.png';

                                        foreach ($troutnetwork as $site_id => $site_info) {
                                            $active = ($current == $site_id) ? " current_site" : '';
//                                            echo "<li class='footer-link {$active}'><a href='{$site_info['url']}' target='_Blank' id='footer-link-{$site_id}'>{$site_info['title']}</a></li>";
                                        }
                                        ?>
                                        <?php wp_nav_menu( array( 'theme_location' => 'footer_term' ) ); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer-col">
                                <h2>Visit</h2>
                                <p><?= get_field('footer_address', 'option'); ?></p>
                            </div>
                            <div class="footer-col">
                                <h2>Services</h2>
                                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>

                            </div>
                            <div class="footer-col">
                                <h2>Newsletter</h2>
                               <!-- Begin Mailchimp Signup Form -->
                                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                                <style type="text/css">
                                #mc_embed_signup{background:#142d06; clear:left; font:14px Helvetica,Arial,sans-serif;  width:300px;}
                                #mc_embed_signup form {padding: 0;}
                                /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                                We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                                </style>
                                <div id="mc_embed_signup">
                                <form action="https://troutcreek.us19.list-manage.com/subscribe/post?u=0048b6d599888a2b50b08a112&amp;id=5d4b93aa33" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                <div class="mc-field-group">
                                <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                                </label>
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                </div>
                                <div class="mc-field-group">
                                <label for="mce-FNAME">First Name </label>
                                <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                                </div>
                                <div class="mc-field-group">
                                <label for="mce-LNAME">Last Name </label>
                                <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                                </div>
                                <div class="mc-field-group size1of2">
                                <label for="mce-BIRTHDAY-month">Birthday </label>
                                <div class="datefield">
                                <span class="subfield monthfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="MM" size="2" maxlength="2" name="BIRTHDAY[month]" id="mce-BIRTHDAY-month"></span> /
                                <span class="subfield dayfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="DD" size="2" maxlength="2" name="BIRTHDAY[day]" id="mce-BIRTHDAY-day"></span>
                                <span class="small-meta nowrap">( mm / dd )</span>
                                </div>
                                </div> <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_0048b6d599888a2b50b08a112_5d4b93aa33" tabindex="-1" value=""></div>
                                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                    </div>
                                </form>
                                </div>
                                <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                                <!--End mc_embed_signup-->
                            </div>
                        </div>
                        <div class="bottom-footer">
                            <p id="footer-info">crafted by&nbsp;<a class="roi-credit" href="https://roimediaworks.ca/">roi media works</a> 2020 © &nbsp;<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. all rights reserved.</p>

                        </div>
                       </div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>
