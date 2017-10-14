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

							<?php $args = array(
        						'post_type' => 'games' );

    							$categories = get_categories( $args );
    							foreach ( $categories as $category ) {

    							echo '<h2>' . $category->name . '</h2>';

        						$args['category'] = $category->term_id;
        						$posts = get_posts($args); ?>

						        <ul class="menu-items-container">
						            <?php foreach($posts as $post) { ?>
						                <li><?php the_title(); ?></li>
						            <?php  } ?>
						        </ul>
						<?php } ?>
						</main>
				</div>
			</div>

<?php get_footer(); ?>
