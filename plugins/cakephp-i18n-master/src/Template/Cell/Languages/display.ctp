<?php if (!empty($languageNames)): ?>
	<?php if ($title): ?>
	<a class="language-current" href="#">
		<span class="label"><?= $title ?></span>
	</a>
	<?php endif ?>
	<ul class="language-list">
		<?php
		foreach ($languageNames as $locale => $language):
			$itemClasses = ['language-list-item'];
		
			if ($currentLocale === $language['locale'])
				$itemClasses[] = 'language-list-item--active';
		
			echo $this->Html->tag('li', 
				$this->Html->link($language['name'], 
					$language['link'], 
					['class' => 'language-list-link']),
				['class' => implode(' ', $itemClasses)]	
			);
		endforeach;
		?>
	</ul>
<?php endif; ?>