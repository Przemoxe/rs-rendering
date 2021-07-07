<?php 

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              =>  'typ wpisu', 'taxonomy general name', 'gp' ,
		'singular_name'     =>  'typ wpisu', 'taxonomy singular name', 'gp',
		'search_items'      =>  'Search typ wpisu', 'gp' ,
		'all_items'         =>  'All typ wpisu', 'gp' ,
		'parent_item'       =>  'Parent typ wpisu', 'gp' ,
		'parent_item_colon' =>  'Parent typ wpisu:', 'gp' ,
		'edit_item'         =>  'Edit typ wpisu', 'gp' ,
		'update_item'       =>  'Update typ wpisu', 'gp' ,
		'add_new_item'      =>  'Add New typ wpisu', 'gp' ,
		'new_item_name'     =>  'New typ wpisu Name', 'gp' ,
		'menu_name'         =>  'typ wpisu', 'gp' ,
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
	    'show_in_rest'		=> true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'typ_wpisu' ),
	);

	register_taxonomy( 'typ_wpisu', array( 'baza_wiedzy' ), $args );

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              =>  'na główną', 'taxonomy general name', 'gp' ,
		'singular_name'     =>  'na główną', 'taxonomy singular name', 'gp',
		'search_items'      =>  'Search na główną', 'gp' ,
		'all_items'         =>  'All na główną', 'gp' ,
		'parent_item'       =>  'Parent na główną', 'gp' ,
		'parent_item_colon' =>  'Parent na główną:', 'gp' ,
		'edit_item'         =>  'Edit na główną', 'gp' ,
		'update_item'       =>  'Update na główną', 'gp' ,
		'add_new_item'      =>  'Add New na główną', 'gp' ,
		'new_item_name'     =>  'New na główną Name', 'gp' ,
		'menu_name'         =>  'na główną', 'gp' ,
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
	    'show_in_rest'		=> true,
		'show_admin_column' => false,
		'show_in_menu'		=> false,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'na_glowna' ),
	);

	register_taxonomy( 'na_glowna', array( 'atrakcje' ), $args );