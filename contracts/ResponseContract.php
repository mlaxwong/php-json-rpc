<?php

namespace Contracts\JsonRPC;

interface ResponseContract
{
    public function id(): string;
}
