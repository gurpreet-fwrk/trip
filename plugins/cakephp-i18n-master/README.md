# MultiLanguage plugin for CakePHP

This plugin depends on the [I18n plugin by ADmad](https://github.com/ADmad/cakephp-i18n) and will further simplify the configuration effort in internationalizing low-level projects.

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require dvdglth/cakephp-i18n
```

Then load the plugin inside `bootstrap.php`:

```
Plugin::load('MultiLanguage', ['bootstrap' => true, 'routes' => true]);
```

## Usage

In `/src/Application.php` add the Middleware after the default `RoutingMiddleware::class`.

```
use MultiLanguage\Middleware\MultiLanguageMiddleware;

public function middleware($middleware)
{
    $middleware
		->add(MultiLanguageMiddleware::class);

    return $middleware;
}
```

In `routes.php` add the following:

```
use MultiLanguage\Routing\Route\MultiLanguageRoute;
Router::defaultRouteClass(MultiLanguageRoute::class);
```

Maybe you’ll want to set the fallback accordingly:

```
$routes->fallbacks(Router::defaultRouteClass());
```

## Options

The following options can be added to your `/config/app.php`:

```
return [
	'MultiLanguage' => [
		'database' => false, // use database for translating gettext strings, see Shell
	    'languages' => [ // add languages here
	        'de' => [
				'locale' => 'de_DE',
				'title'  => 'Deutsch'
			],
	        'en' => [
				'locale' => 'en_US',
				'title'  => 'English'
			],
			...
	    ],
		'domains' => [ // automatically set corresponsing language for domains and vice versa
			// 'de_DE' => 'example.de',
			// 'en_US' => 'example.com',
			// ...
		]
	],
	...
];

```

## View Cell

You can output a simple list of available languages by using the View Cell as follows.

```
...
echo $this->cell('MultiLanguage.Languages');
...
```

You can also pass options for the title and which key of `Configure::read('MultiLanguage.languages.{LANGUAGE}')` to use as the title for the languages itself.

```php
...
echo $this->cell('MultiLanguage.Languages', [false, 'locale']);
...
```

Output:
```
<!-- title was disabled here -->
<ul class="language-list">
	<li class="language-list-item language-list-item--active">
		<a href="/de" class="language-list-link">de_DE</a>
	</li>
	<li class="language-list-item">
		<a href="/en" class="language-list-link">en_US</a>
	</li>
</ul>
```


## Shell

If you are using database for the translations, you can use the Shell to extract the messages.

```
bin/cake MultiLanguage
```

## License

Copyright © 2017 David&Goliath