<?php

namespace Contracts\JsonRPC;

interface ResultResponseContract extends ResponseContract
{
    public function result(): string|array;
}
