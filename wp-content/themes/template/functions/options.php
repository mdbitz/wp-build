<?php
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'External Scripts',
			'menu_title'	=> 'External Scripts',
			'menu_slug' 	=> 'external-scripts',
		));

        acf_add_options_page(array(
            'page_title' 	=> 'Site Settings',
            'menu_title'	=> 'Site Settings',
            'menu_slug' 	=> 'site-settings',
        ));
		
	}