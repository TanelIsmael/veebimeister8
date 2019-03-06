<?php
/**
* Generates default options for customizer.
*
* @since  Bizplan 0.1
* @access public
* @param  array $options 
* @return array
*/
	
function bizplan_default_options( $options ){

	$defaults = array(
		# Site identiry
		'show_title'         	   => true,
		'site_title'         	   => esc_html__( 'Bizplan', 'bizplan' ),
		'site_title_color'   	   => '#1a1a1a',
		'show_tagline'       	   => true,
		'site_tagline'       	   => esc_html__( 'Multipurpose WP Theme', 'bizplan' ),
		'site_tagline_color' 	   => '#cccccc',

		# Primary color
		'site_primary_color' 	     => '#0fd4bb',
		'site_primary_hover_color' 	 => '#1a1a1a',
		'menu_padding_top'           => 0,

		# Slider
		'slider_control'     	   => true,
		'slider_timeout'     	   => 5,
		'slider_autoplay'    	   => true,
		'disable_slider'    	   => false,

		# Service
		'disable_service'             => false,

		# Callback
		'disable_callback'            => false,

		# Blog
		'disable_blog'                => false,
		'blog_title'                  => esc_html__( 'LATEST NEWS', 'bizplan' ),
		'blog_number'                 => 3,
		'blog_category'               => 1,
		
		# Theme Options
		# General
		'enable_alt_menu'             => true,
		'top_header_contact_detail'   => false,
		'top_header_address'          => esc_html__( '111 Rock Street, San Francisco', 'bizplan' ),
		'top_header_email'            => esc_html__( 'yourmail@email.com', 'bizplan' ),
		'top_header_phone'            => esc_html__( '1 (234) 567-891', 'bizplan' ),
		'disable_top_header'          => false,
		'disable_fixed_header'        => false,
		'disable_search_icon'         => false,
		'enable_scroll_top_in_mobile' => false,
		
		# Footer
		'footer_text'                 => bizplan_get_footer_text(),
		'disable_footer_widget'      => false
	);

	return array_merge( $options, $defaults );
}
add_filter( 'bizplan_customizer_defaults', 'bizplan_default_options' );

if( !function_exists( 'bizplan_get_footer_text' ) ):
/**
* Generate Default footer text
*
* @return string
* @since bizplan 0.1
*/
function bizplan_get_footer_text(){

	$text = esc_html__( 'Copyright &copy; All Rights Reserved. Proudly powered by', 'bizplan' );
	$text .= ' <a href="'.esc_url( '//wordpress.org' ).'" target="_blank">'.esc_html__( 'WordPress', 'bizplan' ).'</a> | ';

	$text .= esc_html__( 'Bizplan Theme by', 'bizplan' ).' <a href="'.esc_url( '//keonthemes.com' ).'" target="_blank">';
	$text .= esc_html__( 'Keon Themes', 'bizplan' ).'</a>';
							
	return $text;
}
endif;