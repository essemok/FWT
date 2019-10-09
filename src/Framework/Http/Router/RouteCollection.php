<?php

namespace Framework\Http\Router;

class RouteCollection
{
    private $routes = [];

    /**
     * Роут для работы через любой метод
     *
     * @param string $name    Название роута
     * @param string $pattern Как будет отображаться роут
     * @param mixed  $handler Обработчик для данного роута
     * @param array  $tokens  Дополнительные параметры
     */
    public function any($name, $pattern, $handler, array $tokens = [])
    {
        $this->routes[] = new Route($name, $pattern, $handler, [], $tokens);
    }

    /**
     * Роут для работы с поомщью метода GET
     *
     * @param string $name    Название роута
     * @param string $pattern Как будет отображаться роут
     * @param mixed  $handler Обработчик для данного роута
     * @param array  $tokens  Дополнительные параметры
     */
    public function get($name, $pattern, $handler, array $tokens = [])
    {
        $this->routes[] = new Route($name, $pattern, $handler, ['GET'], $tokens);
    }

    /**
     * Роут для работы с помощью метода POST
     *
     * @param string $name    Название роута
     * @param string $pattern Как будет отображаться роут
     * @param mixed  $handler Обработчик для данного роута
     * @param array  $tokens  Дополнительные параметры
     */
    public function post($name, $pattern, $handler, array $tokens = [])
    {
        $this->routes[] = new Route($name, $pattern, $handler, ['POST'], $tokens);
    }

    /**
     * Геттер для имеющихся роутов
     *
     * @return Route[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}