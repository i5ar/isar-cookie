jQuery(document).ready(function($){
	'use strict';
	if('analytics' !== $.cookie( 'isar-cookie')){
		$('body').prepend('<div class="isar-cookie widget">'+isar_cookie_text.advice+'.<button id="accept-cookie">'+isar_cookie_text.agreement+'</button><a href="'+isar_cookie_text.link+'">'+isar_cookie_text.policy+'</a>.</div>');
		$( '#accept-cookie' ).click(function () {
			$.cookie( 'isar-cookie', 'analytics' );
			$( '.isar-cookie' ).remove();
		});
	}
});
