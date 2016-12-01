<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// Mount controller
$app->mount('/stores', new \Sebastianwestberg\GoogleApi\Provider\StoreControllerProvider());

$app->get('/', function() use($app) {
    return '
        <ul>
            <li><a href="/stores">/stores</a></li>
            <li><a href="/stores/some_new_page_token">/stores/new_page_token</a></li>
            <li><a href="/stores/ChIJU-pzi1ydX0YRv1ttpeWqUoo">/stores/place_id</a></li>
        </ul>
    ';
});

// Settings
$app['API_key'] = '';
$app['debug'] = false;

// Boostrap!
$app->run();
