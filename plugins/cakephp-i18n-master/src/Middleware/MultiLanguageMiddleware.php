<?php
namespace MultiLanguage\Middleware;

use Cake\Core\Configure;
use Cake\Core\InstanceConfigTrait;
use Cake\Utility\Hash;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use ADmad\I18n\Middleware\I18nMiddleware;

class MultiLanguageMiddleware extends I18nMiddleware
{
    
    public function __construct($config = [])
    {
		$languages = Configure::read('MultiLanguage.languages');
		$defaultLanguage = Configure::read('App.defaultLocale');
		$i18nDomains = Configure::read('MultiLanguage.domains');
		
		if ($languages && count($languages) > 1) {
			
			if ($i18nDomains && ($domainLocale = array_search($_SERVER['SERVER_NAME'], $i18nDomains)) !== false) {
				$defaultLanguage = $domainLocale;
			}
		
	        if (!isset($config['defaultLanguage'])) {
	            $config['defaultLanguage'] = $defaultLanguage;
	        }
		
	        if (!isset($config['languages'])) {
	            $config['languages'] = $languages;
	        }
		
	        if (!isset($config['redirectToLang'])) {
	            $config['redirectToLang'] = true;
	        }
		
	        if (!isset($config['detectLanguage'])) {
	            $config['detectLanguage'] = true;
	        }
			
		}
		
        parent::__construct($config);
    }

}
