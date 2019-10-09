<?php


namespace Framework\Http\Router;


class Result
{
    private $name;
    private $handler;
    private $attributes;

    /**
     * Result constructor.
     *
     * @param       $name
     * @param       $handler
     * @param array $attributes
     */
    public function __construct($name, $handler, array $attributes)
    {
        $this->name = $name;
        $this->handler = $handler;
        $this->attributes = $attributes;
    }

    /**
     * Возвращает название роута
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Возвращает обработчик для роута
     *
     * @return mixed
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Возвращает дополнительные параметры роута
     *
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}