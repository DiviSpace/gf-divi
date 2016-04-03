<?php
/*
Plugin Name: Gravity Forms Divi Styling Add-On
Plugin URI: http://www.divispace.com
Description: Divi Styling for Gravty Forms brings the beauty of the Divi Theme to your Gravity Forms. Simply activate the plugin and all Gravity Forms will have the Divi Styling

Version: 1.0

Author: DiviSpace
Author URI: http://www.divispace.com/

License: GPLv2

Text Domain: gravityforms-divi
Domain Path: /languages/
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) exit( 'Good try! :)' );

// Localization
function gravityforms_divi_init() {
	load_plugin_textdomain( 'gravityforms-divi', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'gravityforms_divi_init' );

// Enqueue the css file
function gravityforms_divi_enqueue_scripts() {
	if ( wp_basename( get_bloginfo( 'template_directory' ) ) == 'Divi' && class_exists( 'GFForms' ) ) {
		wp_enqueue_style( 'gravityforms-divi-styles', plugins_url( '', __FILE__ ) . '/css/gravityforms-divi.css' );

		$accent_color = esc_html( et_get_option( 'accent_color', '#2ea3f2' ) );
		$all_buttons_font_size = esc_html( et_get_option( 'all_buttons_font_size', '20' ) );
		$all_buttons_text_color = esc_html( et_get_option( 'all_buttons_text_color', $accent_color ) );
		$all_buttons_text_color_hover = esc_html( et_get_option( 'all_buttons_text_color_hover', $accent_color ) );
		$all_buttons_bg_color = esc_html( et_get_option( 'all_buttons_bg_color', '#fff' ) );
		$all_buttons_bg_color_hover = esc_html( et_get_option( 'all_buttons_bg_color_hover', 'rgba(0,0,0,.05)' ) );
		$all_buttons_border_width = esc_html( et_get_option( 'all_buttons_border_width', '2' ) );
		$all_buttons_border_color = esc_html( et_get_option( 'all_buttons_border_color', $accent_color ) );
		$all_buttons_border_color_hover = esc_html( et_get_option( 'all_buttons_border_color_hover', 'transparent' ) );
		$all_buttons_border_radius = esc_html( et_get_option( 'all_buttons_border_radius', '3' ) );
		$all_buttons_border_radius_hover = esc_html( et_get_option( 'all_buttons_border_radius_hover', '3' ) );
		$all_buttons_spacing = esc_html( et_get_option( 'all_buttons_spacing', '0' ) );
		$all_buttons_spacing_hover = esc_html( et_get_option( 'all_buttons_spacing_hover', '0' ) );
		$all_buttons_font_style = esc_html( et_get_option( 'all_buttons_font_style', '', '', true ) );
		$button_text_style = '';
		if ( $all_buttons_font_style !== '' )
			$button_text_style = et_pb_print_font_style( $all_buttons_font_style );
		$all_buttons_font = esc_html( et_get_option( 'all_buttons_font', 'inherit' ) );
		$custom_css = "body .gform_wrapper .gform_footer input.button,body .gform_wrapper .gform_page_footer input.button{background-color:{$all_buttons_bg_color};color:{$all_buttons_text_color};border-width:{$all_buttons_border_width}px;border-color:{$all_buttons_border_color};border-radius:{$all_buttons_border_radius}px;font-family:{$all_buttons_font};font-size:{$all_buttons_font_size}px;letter-spacing:{$all_buttons_spacing}px;{$button_text_style}}body .gform_wrapper .gform_footer input.button:hover,body .gform_wrapper .gform_page_footer input.button:hover{background-color:{$all_buttons_bg_color_hover};color:{$all_buttons_text_color_hover};border-color:{$all_buttons_border_color_hover};border-radius:{$all_buttons_border_radius_hover}px;letter-spacing:{$all_buttons_spacing_hover}px;}}";
		wp_add_inline_style( 'gravityforms-divi-styles', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'gravityforms_divi_enqueue_scripts' );
