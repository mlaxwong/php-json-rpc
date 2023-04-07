<?php

namespace Contracts\JsonRPC;

interface EvaluatorContract
{
    public function evaluate(string $method, array $params = []): ResultResponseContract|ErrorResponseContract;
}
