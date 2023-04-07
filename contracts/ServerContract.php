<?php

namespace Contracts\JsonRPC;

interface ServerContract
{
    const VERSION = '2.0';

    public function reply(MessageContract|string $message): ReplyContract;
}
