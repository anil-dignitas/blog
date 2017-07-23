<?php
	update_option( 'siteurl', 'http://localhost/wordpress' );
	update_option( 'home', 'http://localhost/wordpress');
	//Loading Parent theme styles
	function my_theme_enqueue_styles() {
	    $parent_style = 'parent-style'; 
	    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	    wp_enqueue_style( 'child-style',
	        get_stylesheet_directory_uri() . '/style.css',
	        array( $parent_style ),
	        wp_get_theme()->get('Version')
	    );
	}
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
	// Adding SVG
	function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
	}
	add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );
?>