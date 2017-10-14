<?php
/* Bones Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function games() {
	// creating (registering) the custom type
	register_post_type( 'games', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Games', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Game', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Games', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Game', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Games', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Game', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Game', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Games', 'bonestheme' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Games post type', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 3, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'games', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'games', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type
	register_taxonomy_for_object_type( 'category', 'games' );
	/* this adds your post tags to your custom post type
	register_taxonomy_for_object_type( 'post_tag', 'games' );
*/
}

	// adding the function to the Wordpress init
	add_action( 'init', 'games');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat',
		array('games'), /* if you change the name of register_post_type( 'games', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Game Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Game', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Games', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Games', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Game', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Game:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Game', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Game', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Game Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);

	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag',
		array('games'), /* if you change the name of register_post_type( 'games', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Game Tags', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Game Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Game Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Game Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Game Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Game Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Game Tag', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Game Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Game Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Game Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);

	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/


?>
