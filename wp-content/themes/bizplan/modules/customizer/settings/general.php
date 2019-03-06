<?php
/**
* Sets settings for general fields
*
* @since  Bizplan 0.1
* @param  array $settings
* @return array Merged array
*/

function bizplan_customizer_general_settings( $settings ){

	$general = array(
		'site_title_color' => array(
			'label'     => esc_html__( 'Site Title', 'bizplan' ),
			'transport' => 'postMessage',
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_tagline_color' => array(
			'label'     => esc_html__( 'Site Tagline', 'bizplan' ),
			'transport' => 'postMessage',
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_primary_color' => array(
			'label'     => esc_html__( 'Primary', 'bizplan' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_primary_hover_color' => array(
			'label'     => esc_html__( 'Primary Hover', 'bizplan' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),

		# Theme Options
		# General
		'menu_padding_top' => array(
			'label'     => esc_html__( 'Additional Space on top of Menu.', 'bizplan' ),
			'section'   => 'general_options',
			'type'      => 'number',
			'transport' => 'postMessage'
		),
		'top_header' => array(
			'label'   => esc_html__( 'Top Header Left Content by Page ID', 'bizplan' ),
			'section' => 'general_options',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23', 'bizplan' )
		),
		'top_header_contact_detail' => array(
			'label'   => esc_html__( 'Enable Contact detail form Customizer', 'bizplan' ),
			'section' => 'general_options',
			'type'    => 'checkbox',
		),
		'top_header_address' => array(
			'label'   => esc_html__( 'Enter Address', 'bizplan' ),
			'section' => 'general_options',
			'type'    => 'text',
		),
		'top_header_email' => array(
			'label'   => esc_html__( 'Enter Email', 'bizplan' ),
			'section' => 'general_options',
			'type'    => 'text',
		),
		'top_header_phone' => array(
			'label'   => esc_html__( 'Enter Phone', 'bizplan' ),
			'section' => 'general_options',
			'type'    => 'text',
		),
		'disable_top_header' => array(
			'label'     => esc_html__( 'Disable Top Header', 'bizplan' ),
			'section'   => 'general_options',
			'transport' => 'postMessage',
			'type'      => 'checkbox' ,
		),
		'disable_fixed_header' => array(
			'label'     => esc_html__( 'Disable Fixed Header', 'bizplan' ),
			'section'   => 'general_options',
			'transport' => 'postMessage',
			'type'      => 'checkbox' ,
		),
		'disable_search_icon' => array(
			'label'     => esc_html__( 'Disable Header Search Icon', 'bizplan' ),
			'section'   => 'general_options',
			'type'      => 'checkbox' ,
		),
		'enable_scroll_top_in_mobile' => array(
			'label'     => esc_html__( 'Enable Scroll top in mobile', 'bizplan' ),
			'section'   => 'general_options',
			'transport' => 'postMessage',
			'type'      => 'checkbox' ,
		),
		# Footer
		'footer_text' =>  array(
			'label'     => esc_html__( 'Footer Text', 'bizplan' ),
			'section'   => 'footer_options',
			'type'      => 'textarea'
		),
		'disable_footer_widget' => array(
			'label'   => esc_html__( 'Disable Footer Widget', 'bizplan' ),
			'section' => 'footer_options',
			'type'    => 'checkbox' 
		)
	);

	return array_merge( $settings, $general );
}
add_filter( 'bizplan_customizer_fields', 'bizplan_customizer_general_settings' );