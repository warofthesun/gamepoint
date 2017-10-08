<!--front-page-->
<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 padding_remove-right cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<div>
								<?php $loop = new WP_Query(
									array(
										'post_type' => 'tribe_events',
										'posts_per_page' => 1,
										'eventDisplay' => 'upcoming',
										'order' => 'ASC', '
										paged' )
									);  while ( $loop->have_posts() ) : $loop->the_post();  get_post_meta($post->ID, 'events', true);
								?>
									<article class="homepage_event">
										<h1>Next Event</h1>
										<div class="m-all t-1of2 d-1of2 cf">
											<a href="<?php the_permalink(); ?>" class="event_image">
												<?php if ( has_post_thumbnail() ) the_post_thumbnail('large-square'); ?>
											</a>
										</div>
										<div class="m-all t-1of2 d-1of2 cf">
											<div class="event_title">
												<h1><?php the_title('<a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a>'); ?></h1
													>
											</div >
											<div class="event_date">
												<?php echo tribe_get_start_date(); ?>
											</div>
											<div class="event_content">
												<?php the_content() ?>
											</div>
											<div class="m-all">
												<a href="<?php the_permalink(); ?>" class="pink-btn">Learn More</a>&nbsp;&nbsp;<a href="#" class="pink-btn">See all Events</a>
											</div>
										</div>
									</article>
								<?php endwhile; ?>
							</div>
							<div style="clear:both;"></div>
							<?php $my_query = new WP_Query('pagename=welcome-to-gamepoint-cafe');
							while ($my_query->have_posts()) : $my_query->the_post();?>
							<article>
								<h1><?php the_field('title'); ?></h1>
								<?php the_content() ?>
							</article>
							<?php endwhile; ?>

						</main>

					<?php get_sidebar('sidebar-home'); ?>

				</div>

			</div>


<?php get_footer(); ?>
