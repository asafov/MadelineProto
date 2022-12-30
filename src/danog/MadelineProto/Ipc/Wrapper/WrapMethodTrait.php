<?php

namespace danog\MadelineProto\Ipc\Wrapper;

use danog\MadelineProto\Ipc\Wrapper;
use Generator;

trait WrapMethodTrait
{
    abstract public function __call($name, $args): void;
    public function wrap(...$args): Generator
    {
        $new = yield from Wrapper::create($args, $this->session->getIpcCallbackPath(), $this->logger);
        foreach ($args as &$arg) {
            $new->wrap($arg);
        }
        return $this->__call(__FUNCTION__, $new);
    }
}
