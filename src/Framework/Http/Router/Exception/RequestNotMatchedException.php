<?php

namespace Framework\Http\Router\Exception;

use LogicException;
use Psr\Http\Message\ServerRequestInterface;

class RequestNotMatchedException extends LogicException
{
    private $request;

    public function __construct(ServerRequestInterface $request)
    {
        parent::__construct('Matches not found');
        $this->request = $request;
    }

    /**
     * Возвращает текущий реквест
     *
     * @return ServerRequestInterface
     */
    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }
}