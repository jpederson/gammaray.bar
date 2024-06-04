<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );



// let's create the function for the custom type
function show_post_type() { 

	// creating (registering) the custom type 
	register_post_type( 'show', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 
			'labels' => array(
				'name' => __( 'Shows', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Show', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Shows', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Show', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Show', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Show', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Show', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Shows', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => '',
				'delete_posts' => 'Delete shows'
			), /* end of arrays */
			'description' => __( 'Manage the shows listed on the site.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-format-audio', /* the icon for the custom post type menu */
			'rewrite'	=> array( 
				'slug' => 'show', 
				'with_front' => false 
			), /* you can specify its url slug */
			'has_archive' => 'shows', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail' )
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'show' );	

}


// adding the function to the Wordpress init
add_action( 'init', 'show_post_type');



// add capabilities
function add_show_caps() {

    // gets the author role
    $role = get_role( 'administrator' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'read_show' );
    $role->add_cap( 'edit_show' );
    $role->add_cap( 'delete_show' );
    $role->add_cap( 'edit_shows' );
    $role->add_cap( 'edit_others_shows' );
    $role->add_cap( 'publish_shows' );
    $role->add_cap( 'read_private_shows' );
    $role->add_cap( 'edit_private_shows' );
    $role->add_cap( 'edit_published_shows' );

}
add_action( 'admin_init', 'add_show_caps');

