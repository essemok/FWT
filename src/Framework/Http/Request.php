<?php

namespace Framework\Http;

class Request
{
    /** @var array Данные строки запроса */
    private $queryParams;

    /** @var array|null Данные тела запроса */
    private $parsedBody;

    /**
     * Request constructor.
     *
     * @param array      $queryParams Данные переданные в строке запроса
     * @param array|null $parsedBody  Данные переданные в теле запроса
     */
    public function __construct(array $queryParams = [], ?array $parsedBody = null)
    {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;
    }

    /**
     * Сеттер для параметров строки запроса
     *
     * @param array $queryParams
     * @return Request
     */
    public function setQueryParams(array $queryParams): Request
    {
        $this->queryParams = $queryParams;
        return $this;
    }

    /**
     * Сеттер для параметров из тела запроса
     *
     * @param array|null $parsedBody
     * @return Request
     */
    public function setParsedBody($parsedBody): Request
    {
        $this->parsedBody = $parsedBody;
        return $this;
    }

    /**
     * Возвращаем переменные строки запроса
     *
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * Возвращаем переменные тела запроса
     *
     * @return array|null
     */
    public function getParsedBody(): ?array
    {
        return $this->parsedBody;
    }
}
