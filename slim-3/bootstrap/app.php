<?php

use App\Controllers\HomeController;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

session_start();
require __DIR__ . '/../vendor/autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true,

        'logger' => [
            'name' => 'slim-app',
        ],
    ],
];
$app = new app($config);


$container = $app->getContainer();

$container['views'] = function ($cont) {

    $view = new Twig(__DIR__ . '/../resources/views', ["cache" => false]);

    $twig_extension = new TwigExtension($cont->router, $cont->request->getUri());
    $view->addExtension($twig_extension);

    return $view;
};
$container['HomeController'] = function ($cont) {

    return new HomeController;
};
require __DIR__ . '/../app/routes.php';
