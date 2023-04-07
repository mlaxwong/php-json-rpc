<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\ResponseContract;
use Contracts\JsonRPC\ServerContract;

abstract class Response implements ResponseContract
{
    public function __construct(
        private ?string $id = null
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function version(): string
    {
        return ServerContract::VERSION;
    }

    public function toString(): string
    {
        return json_encode($this->toArray()) ?? '';
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
