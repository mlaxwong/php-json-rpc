<?php

namespace Contracts\JsonRPC;

use IteratorAggregate;
use JsonSerializable;
use Stringable;

interface MessagesContract extends JsonSerializable, Stringable, IteratorAggregate
{
    public function query(string $id, string $method, array $params = []): self;
    public function notity(string $method, array $params = []): self;
    public function toString(): string;
}
