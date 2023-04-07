<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\ErrorResponseContract;
use Contracts\JsonRPC\EvaluatorContract;
use Contracts\JsonRPC\ResultResponseContract;

class Evaluator implements EvaluatorContract
{
    public function evaluate(string $method, array $params = []): ResultResponseContract|ErrorResponseContract
    {
        return new ResultResponse([]);
    }
}
