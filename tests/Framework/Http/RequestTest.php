<?php

namespace Tests\Framework\Http;

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * Проверяем корретность поведения методов при пустых значениях
     * глобальных массивов GET и POST
     */
    public function testEmpty(): void
    {
        $request = new Request();

        $this->assertEquals([], $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    /**
     * Проверяем корретность поведения методов при передачи данных
     * в в строке параметров
     */
    public function testQueryParams(): void
    {
        $request = new Request($data = [
            'name' => 'Semyon',
            'age'  => 32,
        ]);

        $this->assertEquals($data, $request->getQueryParams());
        $this->assertNull($request->getParsedBody());
    }

    /**
     * Проверяем корретность поведения методов при передачи данных
     * в теле запроса
     */
    public function testParsedBody(): void
    {
        $request = new Request([], $data = ['title' => 'song']);

        $this->assertEquals([], $request->getQueryParams());
        $this->assertEquals($data, $request->getParsedBody());
    }
}