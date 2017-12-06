<?php
namespace MultiLanguage\Shell;

use ADmad\I18n\Shell\I18nShell;
use MultiLanguage\I18n\I18nTrait;

class MultiLanguageShell extends I18nShell
{
	
	use I18nTrait;
	
    public $tasks = ['ADmad/I18n.Extract'];
	
	public function initialize()
    {
        parent::initialize();
		$this->setLanguages();
		
		$this->dispatchShell('migrations', 'migrate', '--plugin', 'MultiLanguage');
    }
	
}
