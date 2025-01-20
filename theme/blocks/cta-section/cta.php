<?php
defined( 'ABSPATH' ) || die();

// Get our data

$overwrite_global_cta = ( get_field( 'overwrite_global_cta' ) ) ? get_field( 'overwrite_global_cta' ) : '';
$cta_title            = ( get_field( 'cta_title' ) ) ? get_field( 'cta_title' ) : '';
$cta_button           = ( get_field( 'cta_button' ) ) ? get_field( 'cta_button' ) : '';
$target               = ( isset( $cta_button['target'] ) && ! empty( $cta_button['target'] ) ) ? 'target="' . $cta_button['target'] . '"' : '';
$button_link          = ( isset( $cta_button['url'] ) ) ? $cta_button['url'] : '';
$button_title         = ( isset( $cta_button['title'] ) ) ? $cta_button['title'] : '';

get_template_part(
	'template-parts/parts/cta',
	null,
	array(
		'cta_data' => array(
			'cta_title'         => $cta_title,
			'cta_button_link'   => $button_link,
			'cta_button_title'  => $button_title,
			'cta_button_target' => $target,
		),
	)
);
?>

