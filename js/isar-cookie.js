jQuery(document).ready(function($){
	'use strict';
	if('POLICY' !== $.cookie( '_ic')){
		$('body').prepend('<div class="isar-cookie widget">'+isar_cookie_text.advice+'.<button id="accept-cookie">'+isar_cookie_text.agreement+'</button><a href="'+isar_cookie_text.link+'">'+isar_cookie_text.policy+'</a>.</div>');
		$( '#accept-cookie' ).click(function () {
			$.cookie( '_ic', 'POLICY', { expires: 28, path: '/' } );
			$( '.isar-cookie' ).remove();
		});
	}
	// Require Polylang plug-in
	if('en' == $.cookie( 'pll_language') && 'MODAL' !== $.cookie( 'pll_language_ic')){
		// Require Pop-up script
		setTimeout( "jQuery('.slide_open').click();", 3000 );
		$( '.slide_close' ).click(function () {
			$.cookie( 'pll_language_ic', 'MODAL', { expires: null, path: '/' } );
		});
	}
});
