<?php

namespace Contracts\JsonRPC;

use JsonSerializable;
use Stringable;

interface ResponseContract extends Stringable, JsonSerializable
{
    public function id(): string;
    public function version(): string;
    public function toArray(): array;
}
