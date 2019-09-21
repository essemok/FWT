<?php


use Framework\Http\Request;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = new Request();

$name = $request->getQueryParams()['name'] ?? 'Guest';

header('X-Developer: Sporysh Semyon');
echo 'Hello, ' . $name . '!';
