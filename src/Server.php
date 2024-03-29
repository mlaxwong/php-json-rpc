<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\EvaluatorContract;
use Contracts\JsonRPC\MessageContract;
use Contracts\JsonRPC\ReplyContract;
use Contracts\JsonRPC\ServerContract;

class Server implements ServerContract
{
    public function __construct(
        private EvaluatorContract $evaluator
    ) {
    }

    public function reply(MessageContract|string $message): ReplyContract
    {
        return $this->processMessage(is_string($message) ? Message::decode($message) : $message);
    }

    private function processMessage(MessageContract $message): ReplyContract
    {
        $reply = new Reply();
        foreach ($message as $request) {
            $response = $this->evaluator->evaluate($request->method(), $request->params());
            if (!$request->isNotify()) {
                $reply->add($response);
            }
        }
        return $reply;
    }
}
