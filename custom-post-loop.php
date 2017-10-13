<?php
/*
 * Loop through Categories and Display Posts within
 */
$post_type = 'features';

// Get all the taxonomies for this post type
$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

foreach( $taxonomies as $taxonomy ) :

    // Gets every "category" (term) in this taxonomy to get the respective posts
    $terms = get_terms( $taxonomy );

    foreach( $terms as $term ) : ?>

        <section class="category-section">

        <div class="row">
        <div class="span12">
            <h2 class="mid-heading"><?php echo $term->name; ?></h2>
        </div>

        <?php
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
        $posts = new WP_Query($args);

        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>

            <div class="span4">

                <article class="inner-post clearfix">

                    <div class="inner-img whitebox">
                    <?php if(has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail(); ?>
                    <?php }
                    /* no post image so show default */
                    else { ?>
                           <img src="<?php bloginfo('template_url'); ?>/assets/img/default-img.png" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" width="110" height="110" />
                    <?php } ?>
                    </div>

                    <div class="inner-content">

                    <h3 class="heading-size-14 font-weight-600"><a href="<?php echo get_permalink(); ?>" title="Read more about <?php echo get_the_title(); ?>"><?php  echo get_the_title(); ?></a></h3>

                        <?php the_excerpt(); ?>
                    </div>
                </article><!-- about-box -->


            </div>

        <?php endwhile; endif; ?>
        </div>
        <hr>
        </section>

    <?php endforeach;

endforeach; ?>
