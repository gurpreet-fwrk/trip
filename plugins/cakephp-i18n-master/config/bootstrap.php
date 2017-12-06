<?php
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\I18n\I18n;

Plugin::load('ADmad/I18n');
Plugin::load('Cake/Localized');

if (Configure::read('MultiLanguage.database')) {
	
	I18n::config('default', function ($domain, $locale) {
	    return new \ADmad\I18n\I18n\DbMessagesLoader(
	        $domain,
	        $locale
	    );
	});

	I18n::config('cake', function ($domain, $locale) {
	    return new \ADmad\I18n\I18n\DbMessagesLoader(
	        $domain,
	        $locale
	    );
	});
	
}
?>