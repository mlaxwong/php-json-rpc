<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\ResponseContract;

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
}
