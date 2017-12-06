<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use MultiLanguage\Routing\Route\MultiLanguageRoute;

Router::defaultRouteClass(MultiLanguageRoute::class);
/*
Router::plugin(
    'MultiLanguage',
    ['path' => '/'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
*/