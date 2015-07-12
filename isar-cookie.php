<?php
/**
 * Plugin Name: iSar Cookie
 * Plugin URI: https://github.com/i5ar/isar-cookie
 * Description: iSar Cookie sets POLICY and MODAL cookies as well as the entry language cookie.
 * Version: 1.0.2
 * Author: Pierpaolo Rasicci
 * Author URI: http://c.isarch.it
 * Text Domain: isar-cookie
 * Domain Path: /languages/
 * License: GPL
 */
// Load languages
class iSarCookie {
	function __construct() {
		add_action( 'plugins_loaded', array( $this, 'ic_translation' ));				// Otherwise 'init' hook
		add_action( 'plugins_loaded', array( $this, 'ic_constants' ));					// Set the constants needed by the plugin
		add_action( 'wp_enqueue_scripts', array( $this, 'ic_scripts_and_styles' ));
	}
	function ic_translation() {
		load_plugin_textdomain( 'isar-cookie', false, basename( dirname( __FILE__ )) . '/languages' );
	}
	// Defines constants used by the plugin
	function ic_constants() {
		define( 'ISAR_COOKIE_VERSION', '2015.05.29' );								// Set the version number of the plugin
		define( 'ISAR_COOKIE_DIR', trailingslashit( plugin_dir_path( __FILE__ )));	// Set constant path to the plugin directory
		define( 'ISAR_COOKIE_URI', trailingslashit( plugin_dir_url( __FILE__ )));	// Set constant path to the plugin URL
	}
	// Enable cookie
	function ic_scripts_and_styles() {
		// Load language
		load_plugin_textdomain( 'isar-cookie', false, basename( dirname( __FILE__ )) . '/languages' );
		// Enqueue Pop Up script
		wp_enqueue_script('popupoverlay', plugins_url( 'js/jquery.popupoverlay.js', __FILE__ ), array( 'jquery' ), '1.6.4', true);
		// Enqueue Cookie script
		wp_enqueue_script('jquery-cookie', plugins_url( 'js/jquery.min.cookie.js', __FILE__ ), array( 'jquery' ), '1.4.1', true);
		wp_register_script('isar-cookie-script', plugins_url( 'js/isar-cookie.js', __FILE__ ), array( 'jquery', 'jquery-cookie' ), '1.0.1', true);
		wp_localize_script('isar-cookie-script', 'isar_cookie_text', array(
			'advice'	=> __('This website uses cookies to simplify and improve the user experience', 'isar-cookie'),
			'agreement'	=> __('I Agree', 'isar-cookie'),
			'policy'	=> __('Read more', 'isar-cookie'),
			'link'		=> get_bloginfo('wpurl').'/'.__( 'privacy', 'isar-cookie'))
		);
		// Enqueue custom script
		wp_enqueue_script('isar-cookie-script');
		wp_enqueue_style('isar-cookie-style', plugins_url( 'css/isar-cookie.css', __FILE__ ), array(), '1.0.1');
	}
}
$isar_cookie = new iSarCookie;

/**
 * Pop up modal
 *
 * Paste in the theme 'isar_cookie_language_button()' in order to pop up the available languages.
 * Polylang is required.
 *
 * @link	https://polylang.wordpress.com/documentation/documentation-for-developers/functions-reference/
 */
function isar_cookie_language_button( $button_class = 'hide' ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if( is_plugin_active( 'polylang/polylang.php' )) {
        $previous_page_id = url_to_postid($_SERVER['HTTP_REFERER']);
        $previous_language_pll = pll_get_post_language($previous_page_id);	// works only with pages not archives
        $current_language_pll = pll_current_language();
        if(( $previous_language_pll != $current_language_pll  && $previous_language_pll != '' ) || $previous_language_pll == '' ) { ?>
            <button class="slide_open <?php echo $button_class; ?>"><?php _e( 'Language', 'isar-cookie' ); ?></button>
            <br />
            <div id="slide" class="page-content">
            <?php /* Browser settings language
				$bs_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);
				if ( $bs_lang == 'it-IT' ) { ?>
                <p>Siete nella sezione "<?php echo( pll_current_language( 'locale' )); ?>" del sito e non tutti i contenuti potrebbero essere disponibili per questa lingua.</p>
                <ul class="list-inline comma">Contenuti disponibili: <?php pll_the_languages(); ?></ul><br/>
                <button class="slide_close btn-block">Chiudi</button>
                <?php } else { ?>
                <p>You are in the "<?php echo( pll_current_language( 'locale' )); ?>" section of the website therefore you may find some mismatch of contents with other languages.</p>
                <ul class="list-inline comma taxonomy-description">Available contents: <?php pll_the_languages(); ?></ul><br/>
                <button class="slide_close btn-block">Close</button>
                <?php } */ ?>
            <?php // Local settings language ?>
                <p class="">
				<?php // Polylang current language
					echo __( 'You are in the section', 'isar-cookie' ) .' "'. pll_current_language( 'locale' ) .'" '. __( 'of the website therefore you may find some mismatch of contents with other languages.', 'isar-cookie' ); ?>
				</p>
                <ul class="list-inline comma">
				<?php // Polylang available languages
					_e( 'Available contents: ', 'isar-cookie' );
					pll_the_languages(); ?>
				</ul>
				<br/>
                <button class="slide_close btn-block"><?php _e( 'Close', 'isar-cookie' ); ?></button>
            </div>
        <?php
		}
	}
}

?>