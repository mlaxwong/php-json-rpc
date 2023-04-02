<?php

namespace Tests\Sample;

use Modules\JsonRPC\Messages;
use PHPUnit\Framework\TestCase;

class MessagesTest extends TestCase
{
    public function testJsonEncode()
    {
        $messages = new Messages();
        $messages
            ->query('1', 'method_name', ['param' => 'value'])
            ->notity('notify_method', ['message' => 'hello']);
        $expected = '[{"jsonrpc":"2.0","method":"method_name","params":{"param":"value"},"id":"1"},{"jsonrpc":"2.0","method":"notify_method","params":{"message":"hello"}}]';
        $this->assertEquals($expected, json_encode($messages));
    }
}
