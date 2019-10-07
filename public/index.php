<?php

use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

### Initialization

$request = ServerRequestFactory::fromGlobals();

//### Preprocessing
//
//if (preg_match('#json#i', $request->getHeader('Content-Type'))) {
//    $request = $request->withParsedBody(json_decode($request->getBody()->getContents()));
//}

### Action

$path = $request->getUri()->getPath();
$action = null;

if ($path == '/') {
    $action = function (ServerRequestInterface $request) {
        $name = $request->getQueryParams()['name'] ?? 'Guest';

        return new HtmlResponse('Hello ' . $name . '!');
    };
} else if ($path == '/about') {
    $action = function (ServerRequestInterface $request) {
        return new HtmlResponse('This is simple site');
    };
} else if ($path == '/blog') {
    $action = function (ServerRequestInterface $request) {
        return new JsonResponse([
            ['id' => 1, 'title' => 'First blog'],
            ['id' => 2, 'title' => 'Second blog'],
        ], 200);
    };

} else if (preg_match('#^/blog/(?P<id>\d+)#i', $path, $matches)) {
    $request = $request->withAttribute('id', $matches['id']);
    $action = function (ServerRequestInterface $request) {
        $id = $request->getAttribute('id');
        if ($id > 2) {
            return new JsonResponse(['error' => 'There is no such page'], 404);
        }
        return new JsonResponse(['id' => $id, 'title' => 'Post #' . $id]);
    };
}
if ($action) {
    $response = $action($request);
} else {
    $response = new JsonResponse(['error' => 'Undefined page', 404]);
}


### Postprocessing

$response->withHeader('X-Developer', 'Sporysh Semyon');

### Sending

$emitter = new SapiEmitter();
$emitter->emit($response);
