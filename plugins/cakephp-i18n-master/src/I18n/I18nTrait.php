<?php

namespace MultiLanguage\I18n;

use Cake\Core\Configure;
use Cake\I18n\I18n;

trait I18nTrait
{
    public function setLanguages()
    {
		$languages = Configure::read('MultiLanguage.languages');
		
		if (!empty($languages)) {
			Configure::write('I18n.languages', $languages);
		}
    }
	
	public function currentLocale() {
		return I18n::locale();
	}
	
	public function getInfo($locale = null) {
		$languages = Configure::read('MultiLanguage.languages');
		
		if ($locale === null) {
			$locale = $this->currentLocale();
		}
		
		foreach ($languages as $key => $language) {
			if ($key === $locale) {
				return $language;
			}
			
			if (isset($language['locale']) && $language['locale'] == $locale) {
				return $language;
			}
		}
		
		return false;
	}
}
