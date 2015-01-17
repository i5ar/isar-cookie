(function ($){
	'use strict';
	if('analytics' !== $.cookie( 'isar-cookie')){
		$('body').prepend('<div class="isar-cookie widget">' + cookie_pop_text.intro + '<button id="accept-cookie">' + cookie_pop_text.agreement + '</button></div>');
		$( '#accept-cookie' ).click(function () {
			$.cookie( 'isar-cookie', 'analytics' );
			$( '.isar-cookie' ).remove();
		});
	}
}
(jQuery));
