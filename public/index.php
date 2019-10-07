<?php

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

if ($path == '/') {
    $name = $request->getQueryParams()['name'] ?? 'Guest';
    $response = new HtmlResponse('Hello ' . $name . '!');
} elseif ($path == '/about') {
    $response = new HtmlResponse('This is simple site');
} elseif ($path == '/blog') {
    $response = new JsonResponse([
        ['id' => 1, 'title' => 'First blog'],
        ['id' => 2, 'title' => 'Second blog']
    ], 200);
} elseif (preg_match('#^/blog/(?P<id>\d+)#i', $path, $matches)) {
    $id = $matches['id'];
    if ($id > 2) {
        $response = new JsonResponse(['error' => 'There is no such page'], 404);
    } else {
        $response = new JsonResponse(['id' => $id, 'title' => 'Post #' . $id    ]);
    }

} else {
    $response = new JsonResponse(['error' => 'Undefined page', 404]);
}



### Postprocessing

$response->withHeader('X-Developer', 'Sporysh Semyon');

### Sending

$emitter = new SapiEmitter();
$emitter->emit($response);
