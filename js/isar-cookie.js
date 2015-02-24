jQuery(document).ready(function($) {
	'use strict';
	if('POLICY' !== $.cookie('_ic')) {
		$('body').prepend('<div class="isar-cookie widget"><span class="genericon genericon-info"></span> '+isar_cookie_text.advice+'.<button id="accept-cookie">'+isar_cookie_text.agreement+'</button><a href="'+isar_cookie_text.link+'">'+isar_cookie_text.policy+'</a>.</div>');
		$('#accept-cookie').click(function() {
			$.cookie('_ic', 'POLICY', { expires: 28, path: '/' });	// Set policy cookie for 28 days
			$('.isar-cookie').remove();								// Close policy bar
		});
	}
	// Require Polylang plug-in & Pop-up script
	if('en' == $.cookie('pll_language') && 'MODAL' !== $.cookie('pll_language_ic')) {
		//window.onload = function() {
			setTimeout(function() {
				$('#slide').popup('show');							// Open language Pop-up
			}, 3000);												// Open after 3 seconds the page load
		//};
		$('.slide_close').click(function() {
			$.cookie('pll_language_ic', 'MODAL', { expires: null, path: '/' });
		});
	}
});
