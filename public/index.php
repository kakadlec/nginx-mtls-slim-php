<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

$app->post('/notify', function (Request $request, Response $response, $args) {
    //var_dump($request->getBody()->getContents());

    $response->getBody()->write(json_encode("ok"));
    $response = $response->withStatus(200);
    return $response->withHeader('Content-type', 'application/json');
});

$app->run();
