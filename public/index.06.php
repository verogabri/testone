<?php

/**
 * definisce meglio la struttura dei controller
 * 
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__.'/../vendor/autoload.php';




$container = new \Slim\Container;
$container['settings']['displayErrorDetails'] = true;


// definisco il render engine da usare
$container['view'] = function ($container) {
    
    $view = new \Slim\Views\Twig( '../views/',[
        'cache' => false
        
    ]);
    
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));
    
    return $view;

};


// registro il controller dentro il container per poterlo usare
$container['controller.home'] = function($container) {
    return new \Demo\Controller\HomeController($container['view']);
};

$container['controller.weather'] = function($container) {
    return new \Demo\Controller\WeatherController($container['view']);
};


$app = new \Slim\App($container);

// richiamo il metodo hello del controller
$app->get('/', "controller.home:hello");

// il metodo hello si comporta come la anonymous function della route qui sotto
// $app->get('/', function (Request $request, Response $response) {
//     return $this->view->render($response, 'index.html',
//         ['name'=>"Dude"]
//     );
// });
    

$app->get('/weather', "controller.weather:daily");

// $app->get('/weather', function (Request $request, Response $response) {    
//     return $this->view->render($response, 'weather.html',
//         ['name'=>"Dude"]
//         );
// });




$app->run();
