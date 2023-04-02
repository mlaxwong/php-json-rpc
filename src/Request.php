<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\RequestContract;

class Request implements RequestContract
{
    public function __construct(
        private string $version,
        private string $method,
        private array $params = [],
        private ?string $id = null,
    ) {
    }

    public function version(): string
    {
        return $this->version;
    }

    public function method(): string
    {
        return $this->method;
    }

    public function params(): array
    {
        return $this->params;
    }

    public function id(): ?string
    {
        return $this->id;
    }

    public function isNotify(): bool
    {
        return is_null($this->id);
    }

    public function toArray(): array
    {
        $jsonrpc = $this->version();
        $method = $this->method();
        $params = $this->params();
        $id = $this->id();
        $keys = ['jsonrpc', 'method', 'params'];
        if ($id) {
            $keys[] = 'id';
        }
        return compact(...$keys);
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
