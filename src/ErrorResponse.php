<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\ErrorResponseContract;

class ErrorResponse extends Response implements ErrorResponseContract
{
    public function __construct(
        private string $code,
        private string $message,
        private mixed $data = null,
        private ?string $id = null
    ) {
        parent::__construct($id);
    }

    public function code(): string
    {
        return $this->code;
    }

    public function message(): string
    {
        return $this->message;
    }

    public function data(): mixed
    {
        return $this->data;
    }

    public function toArray(): array
    {
        $jsonrpc = $this->version();
        $code = $this->code();
        $message = $this->message();
        $data = $this->data();
        $id = $this->id();
        $keys = ['jsonrpc', 'code', 'message'];
        if ($data) {
            $keys[] = 'data';
        }
        if ($id) {
            $keys[] = 'id';
        }
        return compact(...$keys);
    }
}
