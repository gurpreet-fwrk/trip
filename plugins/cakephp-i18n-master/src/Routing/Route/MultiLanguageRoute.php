<?php
namespace MultiLanguage\Routing\Route;

use Cake\Core\Configure;
use ADmad\I18n\Routing\Route\I18nRoute;
use MultiLanguage\I18n\I18nTrait;

class MultiLanguageRoute extends I18nRoute
{
	use I18nTrait;
	
    public function __construct($template, $defaults = [], array $options = [])
    {
		$this->setLanguages();
		
        parent::__construct($template, $defaults, $options);
    }
}
