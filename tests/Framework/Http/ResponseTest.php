<?php

namespace Tests\Framework\Http;

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{

    public function testEmpty()
    {
        $response = new Response($body = 'Body');

        $this->assertEquals($body, $response->getBody());
        $this->assertEquals('200', $response->getResponseStatus());
        $this->assertEquals('200', $response->getResponseStatus());
    }

}