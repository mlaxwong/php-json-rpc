<?php

namespace Contracts\JsonRPC;

use Countable;
use IteratorAggregate;
use JsonSerializable;
use Stringable;

/**
 * @extends IteratorAggregate<int, RequestContract>
 */
interface MessagesContract extends JsonSerializable, Stringable, IteratorAggregate, Countable
{
    public function query(string $id, string $method, array $params = []): self;
    public function notity(string $method, array $params = []): self;
    public function toString(): string;
}
