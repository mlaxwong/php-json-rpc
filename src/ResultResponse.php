<?php

namespace Modules\JsonRPC;

use Contracts\JsonRPC\ResultResponseContract;
use Modules\Framework\Helpers\Arr;

class ResultResponse extends Response implements ResultResponseContract
{
    public function __construct(
        private array|string $result,
        private ?string $id = null
    ) {
        parent::__construct($id);
    }

    public function result(): string|array
    {
        return $this->result;
    }

    public function toArray(): array
    {
        $jsonrpc = $this->version();
        $result = $this->result();
        $id = $this->id();
        $keys = ['jsonrpc', 'result'];
        if ($id) {
            $keys[] = 'id';
        }
        return compact(...$keys);
    }

    public static function decode(string $json): ResultResponseContract|false
    {
        if (!is_json($json)) {
            return false;
        }
        $data = json_decode($json, true);
        if (!Arr::validateKeys($data, ['jsonrpc', 'result', '?id'])) {
            return false;
        }
        unset($input['jsonrpc']);
        return new self(...$data);
    }
}
