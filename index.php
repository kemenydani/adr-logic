<?php

error_reporting(E_ALL);

use app\src\action\ArticleListAction;
use app\src\ActionLoader;
use app\src\responder\ArticleListResponder;
use app\src\Route;

require 'vendor/autoload.php';

define('__ROOT__', __DIR__);
define('__TEMPLATES__', __ROOT__ . '/app/src/templates/');

$routes = [
    Route::get('/^article\/(?P<lookup>[0-9A-z-_+]+)$/', ArticleListAction::class, ArticleListResponder::class)
];
/*
$routes[] = Route::get(
    '/^404$/',
    PageNotFoundAction::class);

$routes[] = Route::get(
    '/^500$/',
    ServerErrorActionAlias::class);
*/
$loader = new ActionLoader();
$loader->setRoutes($routes);
$loader->listen();