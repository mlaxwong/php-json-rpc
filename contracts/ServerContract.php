<?php

namespace Contracts\JsonRPC;

interface ServerContract
{
    public function reply(MessageContract|string $message);
}
