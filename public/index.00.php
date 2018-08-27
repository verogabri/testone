<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__.'/../vendor/autoload.php';

$container = new \Slim\Container;
$container['settings']['displayErrorDetails'] = true;

$container['view'] = function ($container) {
    
    $view = new \Slim\Views\Twig( '../views/',['cache' => false]);
    
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));
    
    return $view;

};



$app = new \Slim\App($container);
$app->get('/', function (Request $request, Response $response) {
    // $response->getBody()->write("Hello World");
    // return $response;
    
    return $this->view->render($response, 'index.html',
            ['name'=>"Dude"]
        );
    
});

$app->get('/weather', function (Request $request, Response $response) {
    
    return $this->view->render($response, 'weather.html',
        ['name'=>"Dude"]
        );
    
});
        



$app->run();
