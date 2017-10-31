<!--front-page-->
<?php get_header(); ?>
			<div id="content">
				<div id="inner-content" class="wrap cf">
						<main id="main" class="m-all t-2of3 d-5of7 padding_remove-right cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

								<?php $loop = new WP_Query('pagename=message-block');
								while ($loop->have_posts()) : $loop->the_post();?>
								<article style="margin-bottom:1em;">
									<h2><?php the_field('title'); ?></h2>
									<?php the_content() ?>
								</article>
								<?php endwhile; ?>

							<article class="homepage_post">


								<?php $loop = new WP_Query( 'posts_per_page=1' ); ?>

								<?php while ($loop -> have_posts()) : $loop -> the_post(); ?>

									<div class="m-all">
										<div class="event_title">
											<h1>
												<?php the_title('<a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a>'); ?>
											</h1>
										</div >

									</div>
									<div style="clear:both"></div>
									<div class="m-all t-all d-all cf">
										<a href="<?php the_permalink(); ?>" class="full_image image">
											<?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
										</a>
									</div>
									<div class="m-all t-all d-all cf">

										<div class="event_content">
											<?php the_excerpt() ?>
										</div>

									</div>


								<?php
								endwhile;
								wp_reset_postdata();
								?>
								</ul>
							</article>
							<article class="homepage_event">
								<?php $loop = new WP_Query(
									array(
										'post_type' => 'tribe_events',
										'posts_per_page' => 1,
										'eventDisplay' => 'upcoming',
										'order' => 'ASC', '
										paged' )
									);  while ( $loop->have_posts() ) : $loop->the_post();  get_post_meta($post->ID, 'events', true);
								?>

										<h2>Next Event</h2>
										<div class="m-all">
											<div class="event_title">
												<h1>
													<?php the_title('<a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a>'); ?>
												</h1>
											</div >
											<div class="event_date">
												<?php echo tribe_get_start_date(); ?>
											</div>
										</div>
										<div style="clear:both"></div>

										<div class="m-all t-all d-all cf">

											<div class="event_content">
												<a href="<?php the_permalink(); ?>" class="event_image image">
													<?php if ( has_post_thumbnail() ) the_post_thumbnail('large-square'); ?>
												</a>
												<div><?php the_content() ?></div>
											</div>
											<div class="m-all">
												<a href="<?php the_permalink(); ?>" class="pink-btn">Learn More</a>&nbsp;&nbsp;<a href="/events" class="pink-btn">See all Events</a>
											</div>
										</div>
										<?php endwhile; ?>
										<div style="clear:both;"></div>
										<?php $my_query = new WP_Query('pagename=site-info'); while ($my_query->have_posts()) : $my_query->the_post();?>
										<?php if( have_rows('event_disclaimer') ): 	while ( have_rows('event_disclaimer') ) : the_row(); ?>

											<div class="event_disclaimer"><span><?php the_sub_field('event_disclaimer') ?></span></div>
										<?php endwhile; endif; endwhile; ?>
									</article>
						</main>

					<?php get_sidebar('sidebar-home'); ?>

				</div>

			</div>


<?php get_footer(); ?>
