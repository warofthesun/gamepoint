<?php
/*
 Template Name: Games Page
*/
?>
<!--page-games-->
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">


							<?php $post_type = 'games';
								// Get all the taxonomies for this post type
								$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

								foreach( $taxonomies as $taxonomy ) :

									// Gets every "category" (term) in this taxonomy to get the respective posts
									$terms = get_terms( $taxonomy );

									foreach( $terms as $term ) :

										$args = array(
												'post_type' => $post_type,
												'posts_per_page' => -1,  //show all posts
												'tax_query' => array(
													array(
														'taxonomy' => $taxonomy,
														'field' => 'slug',
														'terms' => $term->slug,
													)
												)

											);
										$posts = new WP_Query($args); ?>
										<div class="game_category"><?php echo $term->name.'<br />'; ?></div>
										<ul>
										<?php
											if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>
										<li>
											<div class="game_name"><?php the_title(); ?></div>
										</li>
										<?php endwhile; endif; ?>
										</ul>
									<?php endforeach; endforeach; ?>
						</main>
				</div>
			</div>

<?php get_footer(); ?>
