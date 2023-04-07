<?php

namespace Modules\JsonRPC;

use ArrayIterator;
use Contracts\JsonRPC\ReplyContract;
use Contracts\JsonRPC\ResponseContract;
use Traversable;

class Reply implements ReplyContract
{
    private array $responses = [];

    public function add(ResultResponse|ErrorResponse $response): ReplyContract
    {
        $this->responses[] = $response;
        return $this;
    }

    private function oneOrManyResponse(): Request|array
    {
        return count($this->responses) == 1 ? $this->responses[0] : $this->responses;
    }

    public function toString(): string
    {
        return json_encode($this->oneOrManyResponse()) ?? '';
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->responses);
    }

    public function jsonSerialize(): mixed
    {
        $oneOrMany = $this->oneOrManyResponse();
        return $oneOrMany instanceof ResponseContract ? $oneOrMany->toArray() : $oneOrMany;
    }

    public function count(): int
    {
        return count($this->responses);
    }
}
