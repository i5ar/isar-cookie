jQuery(document).ready(function($){
	'use strict';
	if('analytics' !== $.cookie( 'isar-cookie')){
		$('body').prepend('<div class="isar-cookie widget">'+isar_cookie_text.intro+'.<button id="accept-cookie">'+isar_cookie_text.agreement+'</button></div>');
		$( '#accept-cookie' ).click(function () {
			$.cookie( 'isar-cookie', 'analytics' );
			$( '.isar-cookie' ).remove();
		});
	}
});
