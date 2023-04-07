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

    public function reply(MessageContract|string $message)
    {
        return $this->processMessage(is_string($message) ? Message::decode($message) : $message);
    }

    private function processMessage(MessageContract $message)
    {
        $responses = [];
        foreach ($message as $request) {
            $response = $this->evaluator->evaluate($request->method(), $request->params());
            if (!$request->isNotify()) {
                $responses[] = $response;
            }
        }
        return $responses;
    }
}
