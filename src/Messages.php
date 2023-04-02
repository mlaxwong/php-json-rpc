<?php

namespace Modules\JsonRPC;

use ArrayIterator;
use Contracts\JsonRPC\MessagesContract;
use Traversable;

class Messages implements MessagesContract
{
    public const VERSION = '2.0';

    private array $requests = [];

    public function query(string $id, string $method, array $params = []): MessagesContract
    {
        $this->requests[] = $this->buildRequest($method, $params, $id);
        return $this;
    }

    public function notity(string $method, array $params = []): MessagesContract
    {
        $this->requests[] = $this->buildRequest($method, $params);
        return $this;
    }

    private function buildRequest(string $method, array $params = [], ?string $id = null): Request
    {
        return new Request(...['version' => self::VERSION, ...compact('method', 'params', 'id')]);
    }

    private function oneOrManyRequest(): Request|array
    {
        return count($this->requests) == 1 ? $this->requests[0] : $this->requests;
    }

    public function toString(): string
    {
        return json_encode($this->oneOrManyRequest()) ?? '';
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->requests);
    }

    public function jsonSerialize(): mixed
    {
        $oneOrMany = $this->oneOrManyRequest();
        return $oneOrMany instanceof Request ? $oneOrMany->toArray() : $oneOrMany;
    }

    public function count(): int
    {
        return count($this->requests);
    }
}