<?php

namespace Contracts\JsonRPC;

use Countable;
use IteratorAggregate;
use JsonSerializable;
use Modules\JsonRPC\ErrorResponse;
use Modules\JsonRPC\ResultResponse;
use Stringable;

interface ReplyContract extends JsonSerializable, Stringable, IteratorAggregate, Countable
{
    public function add(ResultResponse|ErrorResponse $response): self;
}
