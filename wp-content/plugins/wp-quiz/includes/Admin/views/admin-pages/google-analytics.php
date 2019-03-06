<?php
/**
 * Google analytics tab
 *
 * @package WPQuiz
 * @var CMB2 $cmb
 */

$cmb->add_field(
	array(
		'id'      => 'ga_tracking_id',
		'type'    => 'text',
		'name'    => __( 'Google Analytics Tracking ID', 'wp-quiz' ) . '<span class="pro-text">' . esc_html__( 'Pro feature', 'wp-quiz' ) . '</span>',
		'desc'    => __( 'This option enables the quiz view tracking in the GA.', 'wp-quiz' ),
		'default' => '',
		'classes' => 'wp-quiz-pro-feature',
	)
);

$cmb->add_field(
	array(
		'id'      => 'ga_event_tracking',
		'type'    => 'switch',
		'name'    => __( 'Enable Google Analytics event tracking', 'wp-quiz' ) . '<span class="pro-text">' . esc_html__( 'Pro feature', 'wp-quiz' ) . '</span>',
		'default' => 'off',
		'classes' => 'wp-quiz-pro-feature',
	)
);
