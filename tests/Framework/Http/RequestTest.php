<?php

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    private $request;

    /**
     * Подгатавливаем данные для теста
     */
    protected function setUp(): void
    {
        parent::setUp();
        $_GET = [];
        $_POST = [];

        $this->request = new Request();
    }

    /**
     * Проверяем корретность поведения методов при пустых значениях
     * глобальных массивов GET и POST
     */
    public function testEmpty(): void
    {
        $this->assertEquals([], $this->request->getQueryParams());
        $this->assertNull($this->request->getParsedBody());
    }

    /**
     * Проверяем корретность поведения методов при передачи данных
     * в в строке параметров
     */
    public function testQueryParams(): void
    {
        $_GET = $data = [
            'name' => 'Semyon',
            'age'  => 32,
        ];

        $this->assertEquals($data, $this->request->getQueryParams());
        $this->assertNull($this->request->getParsedBody());
    }

    /**
     * Проверяем корретность поведения методов при передачи данных
     * в теле запроса
     */
    public function testParsedBody(): void
    {
        $_POST = $data = ['title' => 'song'];

        $this->assertEquals([], $this->request->getQueryParams());
        $this->assertEquals($data, $this->request->getParsedBody());
    }
}