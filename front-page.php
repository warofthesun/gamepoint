<!--front-page-->
<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 padding_remove-right cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<article>
								<?php $my_query = new WP_Query('pagename=welcome-to-gamepoint-cafe');
								while ($my_query->have_posts()) : $my_query->the_post();?>

									<h2><?php the_field('title'); ?></h2>
									<?php the_content() ?>

								<?php endwhile; ?>
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
										<div class="m-all t-1of2 d-1of2 cf">
											<a href="<?php the_permalink(); ?>" class="event_image">
												<?php if ( has_post_thumbnail() ) the_post_thumbnail('large-square'); ?>
											</a>
										</div>
										<div class="m-all t-1of2 d-1of2 cf">
											<div class="event_title">
												<h1>
													<?php the_title('<a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a>'); ?>
												</h1>
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
										<?php endwhile; ?>
									</article>
							<div style="clear:both;"></div>
							<!--START LATEST GAMES-->
							<article class="latest_games">
								<h2>Latest Games</h2>
								<ul>
								<?php $post_type = 'games';
									// Get all the taxonomies for this post type
									$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

									foreach( $taxonomies as $taxonomy ) :

									    // Gets every "category" (term) in this taxonomy to get the respective posts
									    $terms = get_terms( $taxonomy );

									    foreach( $terms as $term ) :

									        $args = array(
									                'post_type' => $post_type,
									                'posts_per_page' => 1,  //show one post per category
									                'tax_query' => array(
									                    array(
									                        'taxonomy' => $taxonomy,
									                        'field' => 'slug',
									                        'terms' => $term->slug,
									                    )
									                )

									            );
									        $posts = new WP_Query($args);

									        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>
											<li>
												<div class="game_category"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></div>
												<div class="game_name"><?php the_title(); ?></div>
											</li>
									        <?php endwhile; endif; ?>
									    <?php endforeach; endforeach; ?>
								</ul>
								<div style="clear:both;text-align:center;">
									<a href="#" class="pink-btn">view game library</a>
								</div>
							</article>
						</main>

					<?php get_sidebar('sidebar-home'); ?>

				</div>

			</div>


<?php get_footer(); ?>
