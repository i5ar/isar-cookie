jQuery(document).ready(function($) {
	'use strict';
	// Set POLICY cookie
	if('POLICY' !== $.cookie('ic_policy')) {
		$('body').prepend('<div class="policy widget"><span class="genericon genericon-info"></span> '+isar_cookie_text.advice+'.<button id="accept">'+isar_cookie_text.agreement+'</button><a href="'+isar_cookie_text.link+'">'+isar_cookie_text.policy+'</a>.</div>');
		$('#accept').click(function() {
			$.cookie('ic_policy', 'POLICY', { expires: 28, path: '/' });	// Set POLICY cookie for 28 days
			$('.policy').remove();											// Close POLICY bar
		});
	}
	// Load Pop Up script
	$(document).ready(function() {
		$('#slide').popup({
			outline: true,		// Optional
			focusdelay: 400,	// Optional
			vertical: 'top',	// Optional
			show: true
		});
	});
	// Set MODAL language cookie
	if('MODAL' !== $.cookie('ic_modal')) {
		window.onload = function() {
			setTimeout(function() {
				$('#slide').popup('show');	// Open language Pop-up
			}, 3000);						// Open after 3 seconds the page load
		};
		$('.slide_close').click(function() {
			$.cookie('ic_modal', 'MODAL', { expires: null, path: '/' });				// Set MODAL cookie
			var userLang = document.documentElement.lang;								// Get document language
			var userLangSub = userLang.substring(0,2)									// Get first two characters from lang attribute
			$.cookie('ic_modal_language', userLangSub, { expires: null, path: '/' });	// Set language MODAL cookie
		});
	}
});
