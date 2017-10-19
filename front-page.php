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

							<article class="homepage_event">


								<?php $loop = new WP_Query( 'posts_per_page=1' ); ?>

								<?php while ($loop -> have_posts()) : $loop -> the_post(); ?>

									<div class="m-all">
										<div class="event_title">
											<h1>
												<?php the_title('<a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a>'); ?>
											</h1>
										</div >
										<div class="event_date">
												<?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
												/* the time the post was published */
												'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
												/* the author of the post */
												'<span class="by">'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
												); ?>
										</div>
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
										<div class="m-all t-1of3 d-1of3 cf">
											<a href="<?php the_permalink(); ?>" class="event_image image">
												<?php if ( has_post_thumbnail() ) the_post_thumbnail('large-square'); ?>
											</a>
										</div>
										<div class="m-all t-2of3 d-2of3 cf">

											<div class="event_content">
												<?php the_content() ?>
											</div>
											<div class="m-all">
												<a href="<?php the_permalink(); ?>" class="pink-btn">Learn More</a>&nbsp;&nbsp;<a href="/events" class="pink-btn">See all Events</a>
											</div>
										</div>
										<?php endwhile; ?>
									</article>
						</main>

					<?php get_sidebar('sidebar-home'); ?>

				</div>

			</div>


<?php get_footer(); ?>
