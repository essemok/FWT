<?php

namespace Framework\Http;

class Response
{
    private $headers;
    private $body;
    private $statusCode;
    private $reasonPhrase = '';

    private static $phrases = [
        200 => 'OK',
        301 => 'Moved Permanently',
        400 => 'Bad Request',
        404 => 'Not Found',
        500 => 'Internal Server Error'

    ];

    public function __construct($body, $status = 200)
    {
        $this->body = $body;
        $this->statusCode = $status;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function withBody($body)
    {
        $newResponse = clone $this;
        $newResponse->body = $body;

        return $newResponse;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getReasonPhrase()
    {
        if (!$this->reasonPhrase && isset(self::$phrases[$this->statusCode])){
            $this->reasonPhrase = self::$phrases[$this->statusCode]
        }

        return $this->reasonPhrase;
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        $newResponse = clone $this;
        $newResponse->statusCode = $code;
        $newResponse->reasonPhrase = $reasonPhrase;

        return $newResponse;
    }

    public function getHeaders()
    {
        return $this->headers;
    }
}
