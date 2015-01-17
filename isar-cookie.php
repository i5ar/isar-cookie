<?php
/**
 * Plugin Name: iSar Cookie
 * Plugin URI: https://github.com/i5ar/isar-cookie/
 * Description: The iSar Simple Cookie.
 * Version: 1.0.1
 * Author: Pierpaolo Rasicci aka iSar
 * Author URI: http://isarch.it/three.html
 * Text Domain: isar-cookie
 * Domain Path: /languages/
 * License: GPL
 */

function cookie_pop_scripts_and_styles() {
	wp_enqueue_script('jquery-cookie', plugins_url( '/js/jquery.min.cookie.js', __FILE__ ), array( 'jquery' ), '1.4.1', true);
	wp_register_script('isar-cookie-script', plugins_url( '/js/isar-cookie.js', __FILE__ ), array( 'jquery', 'jquery-cookie' ), '1.0.1', true);
	wp_localize_script('isar-cookie-script', 'cookie_pop_text', array(
		'intro'		=> __('This website uses cookies to simplify and improve the user experience.', 'isar-cookie'),
		'agreement'	=> __('I Agree', 'isar-cookie'),
		'policy'	=> __('For more information please take a look at our privacy policy.', 'isar-cookie'))
	);
	wp_enqueue_script('isar-cookie-script');
	wp_enqueue_style('isar-cookie-style', plugins_url( '/css/isar-cookie.css', __FILE__ ), array(), '1.0.1');
}
add_action( 'wp_enqueue_scripts', 'cookie_pop_scripts_and_styles' );

?>