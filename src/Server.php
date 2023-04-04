<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\EvaluatorContract;
use Contracts\JsonRPC\MessageContract;
use Contracts\JsonRPC\ServerContract;

class Server implements ServerContract
{
    public function __construct(
        private EvaluatorContract $evaluator
    ) {  
    }
    
    public function reply(MessageContract $message)
    {
    }

    private function processMessage(MessageContract $message)
    {
        foreach ($message as $request) {
        }
    }
}
