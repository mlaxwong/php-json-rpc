<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\EvaluatorContract;
use Contracts\JsonRPC\MessagesContract;
use Contracts\JsonRPC\ServerContract;

class Server implements ServerContract
{
    public function __construct(
        private EvaluatorContract $evaluator
    ) {  
    }
    
    public function reply(MessagesContract $messages)
    {
    }

    private function processMessages(MessagesContract $messages)
    {
        foreach ($messages as $request) {
        }
    }
}
