<?php
	function uttheme_widgets_init() {
	    register_sidebar( array(
	        'name' => __( 'Main Sidebar', 'srcollab' ),
	        'id' => 'sidebar',
	        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'srcollab' ),
	        'before_title' => '<h3>',
	        'after_title' => '</h3>',
	    ) );
	}
	add_action( 'widgets_init', 'uttheme_widgets_init' );
