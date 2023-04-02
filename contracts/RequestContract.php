<?php

namespace Contracts\JsonRPC;

use ArrayAccess;
use JsonSerializable;
use Stringable;

interface RequestContract extends Stringable, JsonSerializable
{
    public function version(): string;
    public function method(): string;
    public function params(): array;
    public function id(): ?string;
    public function isNotify(): bool;

    public function toArray(): array;
    public function toString(): string;
}
