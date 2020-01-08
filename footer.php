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
                                <img class="footer-logo" src='<?= get_stylesheet_directory_uri() . '/assets/trout-creek-logo.png' ?>' alt="">
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
                                            echo "<li class='footer-link {$active}'><a href='{$site_info['url']}' target='_Blank' id='footer-link-{$site_id}'>{$site_info['title']}</a></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer-col">
                                <h2>Visit</h2>
                                <p><?= get_field('footer_address', 'option'); ?></p>
                            </div>
                            <div class="footer-col">
                                <h2>Legal</h2>
                                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>
                            </div>
                            <div class="footer-col">
                                <h2>Contact Us</h2>
                                <?php gravity_form( 1, $display_title = true, $display_description = false, $display_inactive = false, $field_values = null, $ajax = true, '', $echo = true );
                                ?>
                            </div>
                        </div>


						<p id="footer-info">Copyrightss &copy; <?php echo date("Y") ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><!-- | <em>Website by <a target="_blank" title="Napa Web Designer" href="http://designsbytierney.com">David Tierney</a></em>--></p>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>
