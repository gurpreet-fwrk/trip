<?php
namespace MultiLanguage\View\Cell;

use Cake\View\Cell;
use Cake\I18n\I18n;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Network\Request;
use MultiLanguage\I18n\I18nTrait;

class LanguagesCell extends Cell 
{
	use I18nTrait;
	
	public function display($title = null, $titleField = null)
	{
		$languageNames = $this->languageNames($titleField);
		$currentLocale = $this->currentLocale();
		$currentLanguage = $this->getInfo();
		
		if ($title === 'current') {
			$title = $currentLanguage['title'];
		}
		
		if (!$title && $title !== false) {
			$title = __d('multi-language', 'Choose language');
		}
		
		$this->set(compact('languageNames', 'currentLocale', 'title'));
	}
	
    private function languageNames($titleField = null)
    {
		$languageNames = Configure::read('MultiLanguage.languages');
		$i18nDomains = Configure::read('MultiLanguage.domains');
		
		if (!$languageNames || count($languageNames) <= 1) {
			return false;
		}
		
		$currentLocale = $this->currentLocale();
		
		foreach ($languageNames as $locale => $language) {
			
			if ($titleField && isset($language[$titleField])) {
				$name = $language[$titleField];
			} else {
				$name = $language['title'];
			}
			
			$link = $this->request->webroot . $locale;
			$here = Router::parse($this->request->here);
			
			if (isset($here['lang'])) {
				if (isset($here['_matchedRoute']))
					unset($here['_matchedRoute']);
				
				if (isset($here['named'])) {
					$named = $here['named'];
					unset($here['named']);
					$here = array_merge($here, $named);
				};
				
				if (isset($here['pass'])) {
					$pass = $here['pass'];
					unset($here['pass']);
					
					foreach ($pass as $k => $v) {
						if ($here['controller'] !== 'Pages' && is_numeric($k)) {
							unset($pass[$k]);
						}
					}
					
					$here = array_merge($here, $pass);
				};
				
				$pass = isset($here['pass']) ? $here['pass'] : [];
				
				$link = array_merge($here, ['lang' => $locale]);
				
				if ($i18nDomains && isset($i18nDomains[$locale]) && $i18nDomains[$locale]) {
					$link = 'http://' . $i18nDomains[$locale] . Router::url($link);
				}
			}
			
			$languageNames[$locale] = $language + [
				'link' => $link,
				'name' => $name
			];
		}
		
		return $languageNames;
    }
	
}

?>