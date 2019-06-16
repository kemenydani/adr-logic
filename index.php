<?php
error_reporting(E_ALL);
use app\src\action\ArticleListAction;
use app\src\ActionLoader;
use app\src\lib\Request;
use app\src\Route;

require 'vendor/autoload.php';

define('__ROOT__', __DIR__);
define('__TEMPLATES__', __ROOT__ . '/app/src/templates/');

$routes[] = Route::get(
    '/^article\/(?P<lookup>[0-9A-z-_+]+)$/',
    ArticleListAction::class);

$loader = new ActionLoader();
$loader->setRoutes($routes);
$loader->listen();