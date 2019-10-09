<?php


namespace Framework\Http\Router;


use Framework\Http\Router\Exception\RequestNotMatchedException;
use Psr\Http\Message\ServerRequestInterface;

class Router
{
    private $routes;

    /**
     * Router constructor.
     *
     * @param RouteCollection $routes
     */
    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;
    }

    public function match(ServerRequestInterface $request): Result
    {
        foreach ($this->routes->getRoutes() as $route) {

            if (preg_match($pattern, $request->getUri()->getPath(), $matches)) {
                return new Result($name, $handler, $attributes);
               }
        }

        throw new RequestNotMatchedException($request);
    }

    public function generate($name, array $attributes = []): string
    {

    }
}