			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">
					<div class="m-all t-all d-1of2 cf">
						<p id="logo" class="h1" itemscope itemtype="http://schema.org/Organization">
							<a href="<?php echo home_url(); ?>" class="gp-gamepoint-logo"></a>
						</p>
						<div class="footer_info">
							<?php $my_query = new WP_Query('pagename=site-info');
							while ($my_query->have_posts()) : $my_query->the_post();?>
							<div> <?php the_field('phone_number') ?></div>
							<a href="mailto:<?php the_field('store_email') ?>"> <?php the_field('store_email') ?></a>
							<div><?php the_field('address'); ?></div>

						</div>
					</div>
					<div class="m-all t-all d-1of2 last-col cf">
						<div class="social">
							<p>Get Social</p>
						<?php if( have_rows('social_platform') ): while ( have_rows('social_platform') ) : the_row(); ?>
						<a href="<?php the_sub_field('social_link') ?>" class="fa fa-<?php the_sub_field('social_icon')?>" target="_blank"></a>
						<?php endwhile; else : endif; ?>
							<?php endwhile; ?>
						</div>
						<nav role="navigation">
							<?php wp_nav_menu(array(
	    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
	    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
	    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
	    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
	    					'theme_location' => 'footer-links',             // where it's located in the theme
	    					'before' => '',                                 // before the menu
	    					'after' => '',                                  // after the menu
	    					'link_before' => '',                            // before each link
	    					'link_after' => '',                             // after each link
	    					'depth' => 0,                                   // limit the depth of the nav
	    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
							)); ?>
						</nav>

						<!--p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p-->
					</div>
				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
