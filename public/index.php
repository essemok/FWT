<?php

use Framework\Http\RequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = RequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'Guest';

header('X-Developer: Sporysh Semyon');
echo 'Hello, ' . $name . '!';
