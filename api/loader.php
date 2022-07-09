<?php
require_once "./system/util/util.php";
require_once "./system/autoload.php";

if (defined("COMPOSER_AUTOLOAD") && COMPOSER_AUTOLOAD !== null)
    require_once COMPOSER_AUTOLOAD;

$app = new Application();

$app->router->response('cart/', new CartResponseHandler());
$app->router->response('stores/', new ShopResponseHandler());

$app->run();