<?php

namespace Contracts\JsonRPC;

interface ErrorResponseContract extends ResponseContract
{
    const PARSE_ERROR = -32700;
    const INVALID_REQUEST = -32600;
    const INVALID_METHOD = -32601;
    const INVALID_ARGUMENTS = -32602;
    const INTERNAL_ERROR = -32603;

    public function code(): string;
    public function message(): string;
    public function data(): mixed;
}
