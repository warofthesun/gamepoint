<div class="related">
<?php // Global variable for terms
$categories = get_the_terms($post->ID, ‘project-categories’);?>

<h1>
<?php foreach($categories as $category)
if($category->slug != ‘featured’ && $category->slug != ‘featured-widget’)
{echo $category->name;} ?> Projects
</h1>

<ul>
<?php
$args = array(
‘post_type’ => ‘project’,
‘posts_per_page’ => -1,
‘orderby’ => ‘title’,
‘order’ => ‘ASC’,
‘tax_query’=> array(
array(
‘taxonomy’=>’project-categories’,
‘field’=>’slug’,
‘terms’=>$category
)
)
);
$loop = new WP_Query( $args );
while( $loop->have_posts() ) : $loop->the_post();
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), ‘thumbnail’ );
$url = $thumb[‘0’];
?>
<a href="<?php the_permalink(); ?>">
<li style="background:url(<?php echo $url;?>) no-repeat 0 0;">
<h3><?php the_title(); ?></h3>
</li>
</a>

<?php endwhile; wp_reset_postdata();?>
</ul>
</div><!– .related –>
