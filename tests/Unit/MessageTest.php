<?php

namespace Tests\Sample;

use Modules\JsonRPC\Message;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    public function testJsonEncodeSingleQuery()
    {
        $message = new Message();
        $message->query('1', 'method_name', ['param' => 'value']);
        $expected = '{"jsonrpc":"2.0","method":"method_name","params":{"param":"value"},"id":"1"}';
        $this->assertEquals($expected, json_encode($message));
    }

    public function testJsonEncodeMixedNotify()
    {
        $message = new Message();
        $message
            ->query('1', 'method_name', ['param' => 'value'])
            ->notity('notify_method', ['message' => 'hello']);
        $expected = '[{"jsonrpc":"2.0","method":"method_name","params":{"param":"value"},"id":"1"},{"jsonrpc":"2.0","method":"notify_method","params":{"message":"hello"}}]';
        $this->assertEquals($expected, json_encode($message));
    }

    public function testJsonDecode()
    {
        $this->assertTrue(is_json('{"id": "12345"}'));
    }
}
