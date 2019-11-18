<?php
/**
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

// Add postMessage support for the Theme Customizer.
function trooper_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'trooper_lite_customize_register' );

// Binds CSS and JS handlers to make Theme Customizer preview reload changes asynchronously.
function trooper_lite_customize_preview_js_css() {
	wp_enqueue_script( 'trooper-customizer-js', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '', true );
}
