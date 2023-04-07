<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\ResultResponseContract;

class ResultResponse extends Response implements ResultResponseContract
{
    public function __construct(
        private array|string $result,
        private ?string $id = null
    ) {
        parent::__construct($id);
    }

    public function result(): string|array
    {
        return $this->result;
    }

    public function toArray(): array
    {
        $jsonrpc = $this->version();
        $result = $this->result();
        $id = $this->id();
        $keys = ['jsonrpc', 'result'];
        if ($id) {
            $keys[] = 'id';
        }
        return compact(...$keys);
    }
}
