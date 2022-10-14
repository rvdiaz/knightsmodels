<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Ajustes Generales',
		'menu_title'	=> 'Ajustes Generales',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'icon_url' => 'dashicons-admin-generic',
		'redirect'		=> false
	));
}